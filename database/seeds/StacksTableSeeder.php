<?php

use Illuminate\Database\Seeder;
use App\Stack;
use App\Blueprint;

class StacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wordpress = Stack::where('name', 'Wordpress')->firstOrCreate([
            'name' => 'Wordpress',
            'provider' => 'digitalocean',
            'servers' => 1,
        ]);

        $wordpress->blueprints()->save(new Blueprint([
            'role' => '*',
        ]));

        Stack::where('name', 'Drupal')->firstOrCreate([
            'name' => 'Drupal',
            'provider' => 'digitalocean',
            'servers' => 1,
        ]);

        Stack::where('name', 'Indie')->firstOrCreate([
            'name' => 'Indie',
            'provider' => 'digitalocean',
            'servers' => 1,
        ]);

        Stack::where('name', 'Startup')->firstOrCreate([
            'name' => 'Startup',
            'provider' => 'digitalocean',
            'servers' => 3,
            'database' => true,
            'redis' => true,
        ]);

        Stack::where('name', 'Elite')->firstOrCreate([
            'name' => 'Elite',
            'provider' => 'digitalocean',
            'servers' => 10,
            'database' => true,
            'redis' => true,
        ]);
    }
}
