<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SpawnServer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * User for whom to spawn a server.
     *
     * @var \App\User
     */
    protected $user;

    /**
     * Blueprint to utilize as the build.
     *
     * @var \App\Blueprint
     */
    protected $blueprint;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Blueprint $blueprint)
    {
        $this->user = $user;
        $this->blueprint = $blueprint;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $droplets = $user->digitalOceanProfile->droplets();

        $response = $droplets->create($this->blueprint)->wait();
    }
}
