<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder
{
    /**
     * Seed all public website gallery photos into the database.
     */
    public function run(): void
    {
        $metadata = [
            'g1.jpg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g2.jpg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g3.jpg' => [
                'title' => 'Pest & Moisture Inspection in Clyde North',
                'description' => 'Reliable pest and moisture inspections to ensure property safety in Clyde North.',
            ],
            'g4.jpeg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g5.jpg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g6.jpeg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g6.jpg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g7.jpeg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g8.jpeg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g10.jpeg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g11.jpeg' => [
                'title' => 'Building Inspector at Work',
                'description' => 'A certified building inspector performing a detailed property inspection to ensure safety and quality.',
            ],
            'g12.jpeg' => [
                'title' => 'Building Inspector at Work',
                'description' => 'A certified building inspector performing a detailed property inspection to ensure safety and quality.',
            ],
            'g13.jpeg' => [
                'title' => 'Building Inspector',
                'description' => 'A certified building inspector performing a detailed property inspection to ensure safety and quality.',
            ],
            'g14.jpeg' => [
                'title' => 'Building Inspector',
                'description' => 'A certified building inspector performing a detailed property inspection to ensure safety and quality.',
            ],
            'g15.jpeg' => [
                'title' => 'Building Inspector',
                'description' => 'A certified building inspector performing a detailed property inspection to ensure safety and quality.',
            ],
            'g16.jpeg' => [
                'title' => 'Building Inspector',
                'description' => 'A certified building inspector performing a detailed property inspection to ensure safety and quality.',
            ],
            'g17.jpeg' => [
                'title' => 'Building Inspector',
                'description' => 'A certified building inspector performing a detailed property inspection to ensure safety and quality.',
            ],
            'g18.jpg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g19.jpg' => [
                'title' => 'Building Inspection in Melbourne',
                'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
            ],
            'g20.jpeg' => [
                'title' => 'Timber Pest Inspection',
                'description' => 'Timber Pest Inspection',
            ],
            'g21.jpeg' => [
                'title' => 'Timber Pest Inspection',
                'description' => 'Timber Pest Inspection',
            ],
            'g23.jpeg' => [
                'title' => 'Timber Pest Inspection',
                'description' => 'Timber Pest Inspection',
            ],
            'g24.jpeg' => [
                'title' => 'Timber Pest Inspection',
                'description' => 'Timber Pest Inspection',
            ],
        ];

        $files = File::glob(public_path('images/g*.*'));

        if (!empty($files)) {
            usort($files, function ($a, $b) {
                preg_match('/(\d+)/', basename($a), $mA);
                preg_match('/(\d+)/', basename($b), $mB);
                $numA = isset($mA[1]) ? (int)$mA[1] : 0;
                $numB = isset($mB[1]) ? (int)$mB[1] : 0;
                if ($numA === $numB) {
                    return strcmp(basename($a), basename($b));
                }
                return $numA <=> $numB;
            });

            $order = 1;

            foreach ($files as $file) {
                $base = basename($file);
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                    continue;
                }

                $meta = $metadata[$base] ?? [
                    'title' => 'Building Inspection in Melbourne',
                    'description' => 'Comprehensive property inspections by certified building inspectors in Melbourne.',
                ];

                // Upsert or create if not present
                Gallery::firstOrCreate(
                    ['image' => 'images/' . $base],
                    [
                        'title' => $meta['title'],
                        'description' => $meta['description'],
                        'sort_order' => $order++,
                        'status' => true,
                    ]
                );
            }
        }
    }
}
