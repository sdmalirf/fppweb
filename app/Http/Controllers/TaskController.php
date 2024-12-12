<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        if($search){
            $data = Task::where('user_id', Auth::id())->where('is_done', false)->where('name', 'LIKE', '%'.$search.'%')->get();
            $done = Task::where('user_id', Auth::id())->where('is_done', true)->where('name', 'LIKE', '%'.$search.'%')->get();
        }else{
            $data = Task::where('user_id', Auth::id())->where('is_done', false)->get();
            $done = Task::where('user_id', Auth::id())->where('is_done', true)->get();
        }

        return view('task', compact(['data', 'done', 'search']));
    }

    public function create(){
        return view('task_create');
    }

    public function store(Request $request){
        $data = Task::create([
            'name' => $request->name,
            'date' => $request->date,
            'user_id' => Auth::id(),
            'is_done' => false,
            'is_fav' => false
        ]);

        return redirect('task');
    }

    public function favourite($id){
        $data = Task::where('id', $id)->first();
        $data->is_fav = !$data->is_fav;
        $data->save();

        return redirect()->back();
    }

    public function done($id){
        $data = Task::where('id', $id)->first();
        $data->is_done = !$data->is_done;
        $data->save();

        return redirect()->back();
    }
}
