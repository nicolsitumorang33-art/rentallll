<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['name' => 'Toyota Avanza', 'description' => '4 Pintu · 7 Penumpang · Manual', 'price' => 350000, 'image' => 'car-avanza.jpg', 'seats' => 7, 'transmission' => 'Manual'],
            ['name' => 'Mitsubishi Xpander', 'description' => '4 Pintu · 7 Penumpang · Automatic', 'price' => 400000, 'image' => 'car-xpander.jpg', 'seats' => 7, 'transmission' => 'Automatic'],
            ['name' => 'Toyota Innova', 'description' => '4 Pintu · 7 Penumpang · Automatic', 'price' => 500000, 'image' => 'car-Innova.jpg', 'seats' => 7, 'transmission' => 'Automatic'],
            ['name' => 'Honda Brio', 'description' => '4 Pintu · 5 Penumpang · Manual', 'price' => 250000, 'image' => 'car-brio.jpg', 'seats' => 5, 'transmission' => 'Manual'],
            ['name' => 'Toyota Fortuner', 'description' => '4 Pintu · 7 Penumpang · Automatic', 'price' => 900000, 'image' => 'car-fortuner.jpg', 'seats' => 7, 'transmission' => 'Automatic'],
            ['name' => 'Suzuki Ertiga', 'description' => '4 Pintu · 7 Penumpang · Manual', 'price' => 300000, 'image' => 'car-ertiga.jpg', 'seats' => 7, 'transmission' => 'Manual'],
            ['name' => 'Isuzu Elf', 'description' => '4 Pintu · 19 Penumpang · Manual', 'price' => 1200000, 'image' => 'car-elf.jpg', 'seats' => 19, 'transmission' => 'Manual'],
            ['name' => 'Mitsubishi Pajero Sport', 'description' => '4 Pintu · 7 Penumpang · Automatic', 'price' => 800000, 'image' => 'car-pajero.jpg', 'seats' => 7, 'transmission' => 'Automatic'],
            ['name' => 'Daihatsu Ayla', 'description' => '4 Pintu · 5 Penumpang · Manual', 'price' => 200000, 'image' => 'car-ayla.jpg', 'seats' => 5, 'transmission' => 'Manual'],
            ['name' => 'Daihatsu Sigra', 'description' => '4 Pintu · 7 Penumpang · Manual', 'price' => 250000, 'image' => 'car-sigra.jpg', 'seats' => 7, 'transmission' => 'Manual'],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
