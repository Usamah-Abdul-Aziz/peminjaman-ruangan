<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['name' => 'Ruang Rapat 1', 'description' => 'Ruang rapat lantai 1'],
            ['name' => 'Ruang Rapat 2', 'description' => 'Ruang rapat lantai 2'],
            ['name' => 'Aula Besar', 'description' => 'Aula untuk acara besar'],
            ['name' => 'Lab Komputer', 'description' => 'Laboratorium komputer'],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
