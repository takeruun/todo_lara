<?php

namespace App\Http\Controllers;

use App\User;
use App\Folder;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalenderController extends Controller
{
    public function index(int $year, int $month){
        $day_info = new Carbon("$year-$month-01");
        $first_week = $day_info->dayOfWeek;
        $days_in_month = $day_info->daysInMonth;
        
        $prev_month = $month - 1;
        $prev_day_info = new Carbon("$year-$prev_month-01");
        $prev_days_in_month = $prev_day_info->daysInMonth;
        
        $weeks = [];
        $week = '';
        $add_day = $prev_days_in_month - $first_week + 1;
        $day = 1;
        /*
        for($i=0; $i<7; $i++){
            if($i < $first_week) {
                $week .= '<td class="prev">'. $add_day;
                $add_day++;
            }else{
                $day == Carbon::now()->format('Y-m-j') ? $week .= '<td class="now today">'.$day : $week .= '<td class="now">'.$day;
                $day++;
            }
            $week .= '</td>';
        }
        array_push($weeks, $week);
        
        $day_count=1;
        $week='';
        
        for ($day = 7 - $first_week+1; $day <= $days_in_month; $day++){
            $day == Carbon::now()->format('Y-m-j') ? $week .= '<td class="now today">'.$day : $week .= '<td class="now">'. $day;   
            $week .= '</td>';
            if ($day_count % 7 == 0 || $day == $days_in_month){
                array_push($weeks, $week);
                $week = '';
            }
            $day_count++;
        }
        */
        $week = [];
        $day_tag = '';
        $day = 1;
        for($i = 0; $i < 7; $i++){
            if($i < $first_week){
                $day_tag .='<p class="prev">'. $add_day. '</p>';
                $add_day++;
            }else{
                $day_tag .='<p class="now">'. $day. '</p>';
                $day++;
            }
            array_push($week, $day_tag);
            $day_tag = '';
        }
        array_push($weeks, $week);

        $day_count = 1;
        $week = [];
        $day_tag = '';
        for($day = 7 - $first_week + 1; $day <= $days_in_month; $day++){
            $day_tag .= '<p class="now">'. $day. '</p>';
            array_push($week, $day_tag);
            if($day_count % 7 == 0 || $day == $days_in_month){
                array_push($weeks, $week);
                $week = [];
            }
            $day_tag = '';
            $day_count++;
        }

        $num = count($weeks[count($weeks)-1]);
        for($i = 1; $i <= 7 - $num; $i++) array_push($weeks[count($weeks)-1], '<p class="next">'. $i. '</p>');
        
        $all_tasks = Auth::user()->getAllTasks();

        return view('calenders/index', [
            'weeks' => $weeks,
            'today_info' => Carbon::now()->format('Y-n-j'),
            'year' => $year,
            'month' => $month,
            'all_tasks' => $all_tasks,
        ]);
    }
}
