<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Concept 5 Gaming PC',
                'description' => 'Entry-level gaming PC for 1080p gaming.',
                'price' => 999.00,
                'stock' => 5,
                'image' => 'concept5.jpg',
                'available_colors' => json_encode(['black', 'white']),
                'type' => 'pc',
                'category' => 'Gaming PC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Concept 9 Ultra PC',
                'description' => 'High-end PC for 4K gaming and streaming.',
                'price' => 1999.00,
                'stock' => 3,
                'image' => 'concept9.jpg',
                'available_colors' => json_encode(['black', 'red']),
                'type' => 'pc',
                'category' => 'Gaming PC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Logitech G Pro X Superlight',
                'description' => 'Wireless gaming mouse with ultra-light design.',
                'price' => 149.00,
                'stock' => 10,
                'image' => 'gpro-x.jpg',
                'available_colors' => json_encode(['black', 'white', 'pink']),
                'type' => 'mouse',
                'category' => 'Mouse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HyperX Cloud II',
                'description' => 'Comfortable gaming headset with virtual 7.1.',
                'price' => 99.00,
                'stock' => 8,
                'image' => 'hyperx-cloud-2.jpg',
                'available_colors' => json_encode(['black', 'red']),
                'type' => 'headset',
                'category' => 'Headset',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keychron K6 Wireless',
                'description' => 'Compact wireless mechanical keyboard with hot‑swappable switches.',
                'price' => 89.00,
                'stock' => 12,
                'image' => 'keychron-k6.jpg',
                'available_colors' => json_encode(['black', 'white']),
                'type' => 'keyboard',
                'category' => 'Keyboard',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NVIDIA GeForce RTX 4070',
                'description' => 'Powerful GPU for 1440p high‑refresh gaming and creator workflows.',
                'price' => 599.00,
                'stock' => 6,
                'image' => 'rtx-4070.jpg',
                'available_colors' => json_encode(['black']),
                'type' => 'gpu',
                'category' => 'GPU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
