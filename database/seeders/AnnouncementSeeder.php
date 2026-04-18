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

        if (!$user) {
            return;
        }

        Announcement::insert([
            [
                'title' => 'Sunday Service Time Update',
                'body' => 'Starting this Sunday, our main service will begin at 10:30 AM.',
                'status' => 'published',
                'audience' => 'all',
                'published_at' => now(),
                'user_id' => $user->id,
            ],
            [
                'title' => 'Youth Group Meeting',
                'body' => 'Youth group meets Wednesday at 6:30 PM.',
                'status' => 'published',
                'audience' => 'youth',
                'published_at' => now(),
                'user_id' => $user->id,
            ],
            [
                'title' => 'Volunteer Signup Open',
                'body' => 'Sign up for the upcoming outreach event.',
                'status' => 'draft',
                'audience' => 'members',
                'published_at' => null,
                'user_id' => $user->id,
            ],
            [
                'title' => 'Church Picnic',
                'body' => 'Join us Saturday for food and fellowship at the park.',
                'status' => 'published',
                'audience' => 'all',
                'published_at' => now()->addDays(2),
                'user_id' => $user->id,
            ],
            [
                'title' => 'Maintenance Notice',
                'body' => 'Building closed Friday for maintenance.',
                'status' => 'archived',
                'audience' => 'all',
                'published_at' => now()->subDays(3),
                'user_id' => $user->id,
            ],
        ]);
    }
}