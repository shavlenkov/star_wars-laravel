<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class MakeUserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:user {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes user status to 0';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->firstOrFail();

        if(!$user->status) {
            $this->error("User {$this->argument('email')} already has status 0");
            return;
        }

        $user->status = 0;
        $user->save();

        $this->info("User {$this->argument('email')} got status 0");
    }
}