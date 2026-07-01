<?php

namespace Database\Seeders;

use App\Models\AdministrationGallery;
use Illuminate\Database\Seeder;

class AdministrationGallerySeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'type' => 'gallery',
                'title' => 'Campus & Academic Activities',
                'alt_text' => 'B.D. College campus',
                'url' => '/official-assets',
                'sort_order' => 1,
                'is_big' => true,
                'image' => 'bdcpat_img_001.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'Library',
                'alt_text' => 'B.D. College Library',
                'url' => '/student-zone',
                'sort_order' => 2,
                'is_big' => false,
                'image' => 'bdcpat_202605301534.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'Laboratories',
                'alt_text' => 'B.D. College Laboratories',
                'url' => '/academics',
                'sort_order' => 3,
                'is_big' => false,
                'image' => 'bdcpat_202605301542.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'Computer Lab',
                'alt_text' => 'B.D. College Computer Lab',
                'url' => '/academics',
                'sort_order' => 4,
                'is_big' => false,
                'image' => 'bdcpat_202605201509.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'Seminar Hall',
                'alt_text' => 'B.D. College Seminar Hall',
                'url' => '/events',
                'sort_order' => 5,
                'is_big' => false,
                'image' => 'bdcpat_202604212358.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'NSS / NCC',
                'alt_text' => 'NCC activity at B.D. College',
                'url' => '/ncc',
                'sort_order' => 6,
                'is_big' => false,
                'image' => 'bdcpat_202605232005.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'Seminars',
                'alt_text' => 'Seminar at B.D. College',
                'url' => '/event-downloads',
                'sort_order' => 7,
                'is_big' => false,
                'image' => 'bdcpat_202605201518.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'Learning',
                'alt_text' => 'Academic activity at B.D. College',
                'url' => '/syllabus-downloads',
                'sort_order' => 8,
                'is_big' => false,
                'image' => 'bdcpat_202604212325.jpg',
            ],
            [
                'type' => 'gallery',
                'title' => 'Campus Programme',
                'alt_text' => 'B.D. College institutional event',
                'url' => '/events',
                'sort_order' => 9,
                'is_big' => false,
                'image' => 'bdcpat_202604212319.jpg',
            ],
            [
                'type' => 'media',
                'title' => 'BD College crowned college champion in NCC camp',
                'alt_text' => 'BD College crowned college champion in NCC camp',
                'url' => '/official-assets',
                'sort_order' => 20,
                'is_big' => false,
                'image' => 'Media_bdcpat_202605261137.jpg',
            ],
            [
                'type' => 'media',
                'title' => 'BD College got the title of College Champion',
                'alt_text' => 'BD College annual training camp achievement',
                'url' => '/official-assets',
                'sort_order' => 21,
                'is_big' => false,
                'image' => 'Media_bdcpat_202605261148.jpg',
            ],
            [
                'type' => 'media',
                'title' => 'Information on research and dissertation writing',
                'alt_text' => 'Information on research and dissertation writing',
                'url' => '/official-assets',
                'sort_order' => 22,
                'is_big' => false,
                'image' => 'Media_bdcpat_202605101337.jpg',
            ],
        ];

        foreach ($items as $item) {
            $image = $item['image'];
            unset($item['image']);

            $gallery = AdministrationGallery::updateOrCreate(
                ['title' => $item['title']],
                array_merge($item, ['status' => true])
            );

            $path = public_path('assets/img/' . $image);

            if (file_exists($path) && ! $gallery->getFirstMedia('image')) {
                $gallery
                    ->addMedia($path)
                    ->preservingOriginal()
                    ->toMediaCollection('image');
            }
        }
    }
}
