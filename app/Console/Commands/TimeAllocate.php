<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TimeAllocate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time_allocate_set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Arrangement after 3 days of statistics';

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
        $allocate_time = Carbon::now()->addDay(3)->toDateString();
        list($t1,$t2,$t3) = getDiffDateRange(Carbon::now()->addDay(1),$allocate_time);

        $data = DB::table('_log_time_allocate as a')->leftJoin('users as b', function ($join){
            $join->on('a.user_id','=','b.id');
        })->where('a.start_time','>=',Carbon::now())->where('a.end_time','<=', $allocate_time)->get();

        // t1
        $this->FormatData($data, $t1);


        // t2
        $this->FormatData($data, $t2);


        /// t3
        $this->FormatData($data, $t3);



    }

    public function FormatData($data, $t1)
    {
        $student = $data->where('a.role',4)->where('a.start_time', $t1);
        $teacher = $data->where('a.role',5)->where('a.start_time', $t1)->where('a.type', 0);
        $assess = $data->where('a.role',5)->where('a.start_time', $t1)->where('a.type', 1);

    }

    public function RecommendAllocationTime($id)
    {
        DB::table('_log_time_allocate')->where('id',$id)->update(['allocate_time' => 1]);
    }
}
