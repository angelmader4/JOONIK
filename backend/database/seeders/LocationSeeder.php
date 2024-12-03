<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [];

        for ($i = 1; $i <= 20; $i++) {
            $locations[] = [
                'code' => $i,
                'name' => 'Sede ' . $this->generateLocationName($i),
                'image' => 'https://picsum.photos/200/300',
                'creation_date' => date("Y-m-d H:i:s"),
            ];
        }

        DB::table('locations')->insert($locations);
    }

    private function generateLocationName($index)
    {
        $names = ['Central', 'Norte', 'Sur', 'Este', 'Oeste', 'Altos', 'Bajos', 'Nueva', 'Antigua', 'Metropolitana'];
        return $names[($index - 1) % count($names)];
    }
}
