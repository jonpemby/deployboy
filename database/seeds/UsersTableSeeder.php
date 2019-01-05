<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! env('TEST_USER') || ! env('TEST_DIGITAL_OCEAN_TOKEN'))
            return;

        $github_id = env('TEST_USER');
        $token_content = env('TEST_DIGITAL_OCEAN_TOKEN');

        $user = User::where('github_id', env('TEST_USER'))->firstOrNew([
            'github_id' => $github_id,
        ]);

        if (! $user->exists())
            $user->save();

        $token = $user->tokens()->where('provider', 'digitalocean')->firstOrNew([
            'user_id' => $user->github_id,
            'content' => $token_content,
            'provider' => 'digitalocean',
        ]);

        if (! $token->exists())
            $token->save();
    }
}
