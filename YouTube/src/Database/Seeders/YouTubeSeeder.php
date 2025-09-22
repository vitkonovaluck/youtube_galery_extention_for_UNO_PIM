<?php

namespace Extra\YouTube\Database\Seeders;

use Extra\YouTube\Models\YouTube;
use Illuminate\Database\Seeder;

class YouTubeSeeder extends Seeder
{
    public function run()
    {
        $videos = [
            [
                'name' => 'Laravel 12 Tutorial',
                'url' => 'https://www.youtube.com/watch?v=ImtZ5yENzgE',
            ],
            [
                'name' => 'PHP for Beginners',
                'url' => 'https://www.youtube.com/watch?v=OK_JCtrrv-c',
            ],
            [
                'name' => 'Docker Basics',
                'url' => 'https://www.youtube.com/watch?v=pTFZFxd4hOI',
            ],
            [
                'name' => 'Vue.js Crash Course',
                'url' => 'https://www.youtube.com/watch?v=qZXt1Aom3Cs',
            ],
            [
                'name' => 'MySQL Tutorial',
                'url' => 'https://www.youtube.com/watch?v=9ylj9NR0Lcg',
            ],
        ];

        foreach ($videos as $video) {
            Youtube::create($video);
        }
    }
}
