<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

#[Title('Edit Profile')]
class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $address; 
    public $profile_photo;
    public $temp_profile_photo;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        // Format nomor telepon jika ada
        $this->phone = $user->phone ? preg_replace('/^\+62/', '', $user->phone) : '';
        $this->address = $user->address;
        $this->profile_photo = $user->profile_photo;
    }

    public function updateProfile()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => [
                'nullable',
                'regex:/^[1-9][0-9]{8,11}$/', // 9-12 digit, tidak boleh diawali 0
                'min:9',
                'max:12'
            ],
            'address' => 'nullable|string|max:255',
            'temp_profile_photo' => 'nullable|image|max:2048'
        ]);

        $user = Auth::user();

        // Format nomor telepon dengan +62
        if ($this->phone) {
            $user->phone = '+62' . $this->phone;
        }

        if ($this->temp_profile_photo) {
            $path = $this->temp_profile_photo->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        if ($user->email !== $this->email) {
            $user->email_verified_at = null;
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->save();

        Toaster::success('Profile updated successfully!');
    }

    public function updatedPhone($value)
    {
        // Hapus karakter non-digit
        $this->phone = preg_replace('/[^0-9]/', '', $value);
        
        // Hapus angka 0 di depan jika ada
        if (strlen($this->phone) > 0 && $this->phone[0] === '0') {
            $this->phone = substr($this->phone, 1);
        }
    }

    public function getInitials()
    {
        $name = $this->name ?? '';
        $words = explode(' ', trim($name));
        $initials = '';
        
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        
        return strlen($initials) > 2 ? substr($initials, 0, 2) : $initials;
    }

    public function render()
    {
        return view('livewire.profile.edit');
    }
}