<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;
use App\Models\User;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@test.com')->first();

        if (! $user) {
            return;
        }

        $announcements = [
            [
                'title' => 'Sunday Service Time Update',
                'body' => 'Starting this Sunday, our main service will begin at 10:30 AM.',
                'status' => 'published',
                'audience' => 'all',
                'published_at' => now(),
            ],
            [
                'title' => 'Youth Group Meeting',
                'body' => 'Youth group meets Wednesday at 6:30 PM.',
                'status' => 'published',
                'audience' => 'youth',
                'published_at' => now(),
            ],
            [
                'title' => 'Volunteer Signup Open',
                'body' => 'Sign up for the upcoming outreach event.',
                'status' => 'draft',
                'audience' => 'members',
                'published_at' => null,
            ],
            [
                'title' => 'Church Picnic',
                'body' => 'Join us Saturday for food and fellowship at the park.',
                'status' => 'published',
                'audience' => 'all',
                'published_at' => now()->addDays(2),
            ],
            [
                'title' => 'Maintenance Notice',
                'body' => 'Building closed Friday for maintenance.',
                'status' => 'archived',
                'audience' => 'all',
                'published_at' => now()->subDays(3),
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'title' => $announcement['title'],
                ],
                [
                    'body' => $announcement['body'],
                    'status' => $announcement['status'],
                    'audience' => $announcement['audience'],
                    'published_at' => $announcement['published_at'],
                ]
            );
        }
    }
}