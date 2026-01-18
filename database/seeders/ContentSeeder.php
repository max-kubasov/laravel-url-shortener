<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Landing;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Создаем тестовый пост для блога
        Post::create([
            'type' => 'blog',
            'title' => '5 Tips to Grow Your Business with Short Links',
            'slug' => '5-tips-grow-business-short-links',
            'excerpt' => 'Discover how professional link shortening can boost your marketing ROI.',
            'content' => 'Full article content about short links goes here...',
            'meta_title' => 'Grow Your Business with Short Links | MyService',
            'meta_description' => 'Learn the best practices for using branded links in 2026.',
            'is_published' => true,
        ]);

        // 2. Создаем тестовую новость
        Post::create([
            'type' => 'news',
            'title' => 'Service Update: We have reached 1 million links shortened!',
            'slug' => 'service-update-1-million-links',
            'excerpt' => 'A big milestone for our platform and our community.',
            'content' => 'We are proud to announce that our users have created over 1,000,000 short links...',
            'meta_title' => '1 Million Links Milestone | MyService News',
            'meta_description' => 'Read about our latest growth and platform updates.',
            'is_published' => true,
        ]);

        // 3. Создаем тестовый лендинг (Solution)
        Landing::create([
            'slug' => 'instagram-link-shortener',
            'h1_title' => 'The Best URL Shortener for Instagram Bio',
            'hero_subtitle' => 'Create clean, trackable links for your Instagram profile in seconds.',
            'main_text' => 'Instagram only gives you one link. Make it count with our advanced analytics...',
            'meta_title' => 'Free Instagram Link Shortener - Track Your Bio Clicks',
            'meta_description' => 'Optimize your Instagram traffic with our powerful shortening tool.',
            'is_active' => true,
        ]);
    }
}
