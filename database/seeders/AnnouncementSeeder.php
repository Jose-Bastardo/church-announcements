<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        Announcement::insert([
            [
                'title' => 'Sunday Service Time Update',
                'body' => 'Starting this Sunday, our main service will begin at 10:30 AM instead of 10:00 AM.',
                'status' => 'published',
                'audience' => 'all',
                'published_at' => now(),
                'user_id' => 1,
            ],
            [
                'title' => 'Youth Group Meeting',
                'body' => 'Youth group will meet this Wednesday at 6:30 PM in the fellowship hall.',
                'status' => 'published',
                'audience' => 'youth',
                'published_at' => now(),
                'user_id' => 1,
            ],
            [
                'title' => 'Volunteer Signup Open',
                'body' => 'We are looking for volunteers for the upcoming community outreach event.',
                'status' => 'draft',
                'audience' => 'members',
                'published_at' => null,
                'user_id' => 1,
            ],
        ]);
    }
}