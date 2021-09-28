<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DailyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create daily new users';

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
        (new User)->createUser();
        echo "nowy user";
    }
}
