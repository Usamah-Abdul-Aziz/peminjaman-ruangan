<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'A' => [
                ['Ruang Kuliah 101', 'Ruang kuliah utama lantai 1', 40, 'Proyektor, AC, Whiteboard'],
                ['Ruang Seminar A', 'Untuk seminar mahasiswa', 30, 'Proyektor, Whiteboard'],
                ['Lab Komputer A1', 'Laboratorium komputer dasar', 25, 'PC, AC, Meja Lab'],
                ['Ruang Rapat A', 'Ruang rapat dosen', 20, 'AC, TV, Whiteboard'],
                ['Ruang Konsultasi A', 'Konsultasi akademik', 15, 'Kursi Sofa, AC'],
            ],
            'B' => [
                ['Lab Elektro B1', 'Lab dasar teknik elektro', 20, 'Alat Ukur, AC'],
                ['Ruang Praktikum B2', 'Praktikum elektronika', 25, 'Meja Praktikum, Alat, Whiteboard'],
                ['Ruang Kuliah 201', 'Ruang kuliah lantai 2', 35, 'Proyektor, AC'],
                ['Ruang Seminar B', 'Seminar internal', 20, 'TV, Kursi Lipat'],
                ['Ruang Diskusi B', 'Ruang diskusi kelompok', 15, 'Meja Bundar, AC'],
            ],
            'C' => [
                ['Ruang Bahasa C1', 'Ruang laboratorium bahasa', 30, 'Headset, AC, Proyektor'],
                ['Ruang Perpustakaan C', 'Perpustakaan mini', 20, 'Rak Buku, Meja Baca, AC'],
                ['Lab Komputer C1', 'Komputer jaringan', 30, 'PC, Router, AC'],
                ['Ruang Multimedia C', 'Multimedia & Editing', 20, 'iMac, Sound System'],
                ['Ruang Podcast C', 'Studio podcast kampus', 10, 'Mic, Kamera, AC'],
            ],
            'D' => [
                ['Ruang Musik D1', 'Studio latihan musik', 15, 'Piano, Gitar, Drum'],
                ['Ruang Tari D2', 'Latihan tari tradisional', 20, 'Cermin, Speaker'],
                ['Ruang Teater D3', 'Pentas kecil', 25, 'Lampu Sorot, Tirai'],
                ['Ruang Audio D', 'Produksi audio', 10, 'Mic, Mixer, PC'],
                ['Ruang Seni Rupa D', 'Studio menggambar', 20, 'Kanvas, Cat, Easel'],
            ],
            'E' => [
                ['Ruang Inovasi E1', 'Tempat inkubasi startup', 25, 'Smart TV, Whiteboard, AC'],
                ['Ruang Maker E2', 'Workshop hardware', 20, '3D Printer, Tools, AC'],
                ['Lab AI E3', 'Laboratorium AI', 15, 'GPU PC, Proyektor'],
                ['Ruang Riset E', 'Ruang riset dosen', 10, 'PC, AC, Rak Buku'],
                ['Ruang Simulasi E', 'Simulasi sistem', 20, 'Simulator, AC, PC'],
            ],
        ];

        foreach ($data as $building => $rooms) {
            foreach ($rooms as $room) {
                Room::create([
                    'name' => $room[0],
                    'description' => $room[1],
                    'capacity' => $room[2],
                    'facilities' => $room[3],
                    'building' => $building,
                ]);
            }
        }
    }
}
