<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class DeletePostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:post {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete post based on user';

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
        $user_id = $this->argument('id');
        if(! is_null($user_id)){
            return DB::table('posts')->where('user_id',$user_id)->delete();
        }else{
            return DB::table('posts')->delete();
        }
        
    }
}
