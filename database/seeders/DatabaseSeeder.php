<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Comment::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = User::factory()->forEachSequence(
            ['name' => 'Jeffrey Way'],
            ['name' => 'Luke Downing'],
            ['name' => 'Adrian'],
            ['name' => 'Mohamed Said']
        )->create();

        [$jeffrey, $luke, $adrian, $mohamed] = $users;

        Comment::factory()->forEachSequence(
            ['user_id' => $jeffrey, 'body' => "Hey Luke, welcome to Laracasts!"],
            ['user_id' => $luke, 'body' => "Thanks Jeffrey, great to be here"],
            ['user_id' => $adrian, 'body' => "@mohamed, how's the series queues coming along?"],
            ['user_id' => $mohamed, 'body' => "Queues? Where were going, we dont need queues"],
            ...Collection::times(250, fn() => ['user_id' => $users->random()]),
        )->create();
    }
}
