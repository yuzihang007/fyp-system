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
        $timeList = getDiffDateRange(Carbon::now()->addDay(1),$allocate_time);

        $data = DB::table('_log_time_allocate as a')->leftJoin('users as b', function ($join){
            $join->on('a.user_id','=','b.id');
        })->where('a.created_at','>=',Carbon::now())->where('a.created_at','<=', $allocate_time)->get();

        // t1-3

        foreach ($timeList as $t){
            $this->FormatData($data, $t);
        }

    }

    // Calculate the one with the shortest conflict time
    public function FormatData($data, $t)
    {
        $this->getStudentsTime($data,$t);
        $this->getEvaluatorsTime($data,$t);
    }

    public function getTeacherTime($data, $t)
    {
        // Priority is calculated based on the teacher’s time
        $list = $data->where('a.role',5)->where('a.type', 0)->where('a.start_time', $t);


    }

    public function getStudentsTime($data, $t)
    {
        $student = $data->where('role',4)->where('start_time', $t)->groupBy('user_id')->map(function ($value) {
            $timePool = collect([]);
            foreach ($value as $val){
                $count = Carbon::parse($val->start_time)->diffInHours($val->end_time);
                for ($i=0;$i<$count+1;$i++){
                    $use_time = Carbon::parse($val->start_time)->addHours($i)->rawFormat('H');
                    $timePool->push($use_time);
                }
            }
            return $timePool;
        });


        return $student;
    }

    public function getEvaluatorsTime($data, $t)
    {
        $evaluators = $data->where('role',5)->where('start_time', $t)->groupBy('user_id')->map(function ($value) {
            $timePool = collect([]);
            foreach ($value as $val){
                $count = Carbon::parse($val->start_time)->diffInHours($val->end_time);
                for ($i=0;$i<$count+1;$i++){
                    $use_time = Carbon::parse($val->start_time)->addHours($i)->rawFormat('H');
                    $timePool->push($use_time);
                }
            }
            return $timePool;
        });

        return $evaluators;
    }

    public function RecommendAllocationTime($id)
    {
        DB::table('_log_time_allocate')->where('id',$id)->update(['allocate_time' => 1]);
    }
}
