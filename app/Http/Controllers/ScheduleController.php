<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\Cron;

class ScheduleController extends Controller
{
    public function index (){
        $schedule = DB::table('list_schedule')->get();
        return view('list-schedule.data', ['schedule' => $schedule]);
    }
    public function add(){
        return view('list-schedule.add');
    }
    public function addProcess(Request $request){

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $request->validate([
        'title' => 'required',
        'schedule' => 'required|cron_expression',
        'url' => 'required|regex:'.$regex,
        ]);
        DB::table('list_schedule')->insert([
            'title' => $request->title,
            'schedule' => $request->schedule,
            'action' => $request->url
        ]);

        return redirect('schedule')->with('status', 'Schedule has been added');
    }

    public function edit($id){
        $schedule = DB::table('list_schedule')->where('id_schedule', $id)->first();
        return view('list-schedule.edit', compact('schedule'));
    }

    public function editProcess(Request $request, $id){
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $request->validate([
        'title' => 'required',
        'schedule' => 'required',
        'url' => 'required|regex:'.$regex,
        ]);
        $schedule = DB::table('list_schedule')->where('id_schedule', $id)
                    ->update([
                        'title' => $request->title,
                        'schedule' => $request->schedule,
                        'action' => $request->url
                    ]);
        return redirect('schedule')->with('status', 'Schedule has been edited');
    }
    public function delete($id){
        DB::table('list_schedule')->where('id_schedule', $id)->delete();
        return redirect('schedule')->with('status', 'Schedule has been deleted');
    }
}
