<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetDBName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:get_db_name';//this is what we have to write along with php artisan

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'to get database name';// this is to get the name of current databse
    //now register this command name in kernel.php under $commands array
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbName = DB::connection()->getDatabaseName();
        $this->info("the current databse name is $dbName");
    }
}
