<?php

namespace App\Http\Controllers;

use App\Models\MyDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyDayController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        if($search){
            $data = MyDay::where('user_id', Auth::id())->where('is_done', false)->where('name', 'LIKE', '%'.$search.'%')->get();
            $done = MyDay::where('user_id', Auth::id())->where('is_done', true)->where('name', 'LIKE', '%'.$search.'%')->get();
        }else{
            $data = MyDay::where('user_id', Auth::id())->where('is_done', false)->get();
            $done = MyDay::where('user_id', Auth::id())->where('is_done', true)->get();
        }

        return view('myday', compact(['data', 'done', 'search']));
    }

    public function create(){
        return view('myday_create');
    }

    public function store(Request $request){
        $data = MyDay::create([
            'name' => $request->name,
            'date' => $request->date,
            'user_id' => Auth::id(),
            'is_done' => false,
            'is_fav' => false
        ]);

        return redirect('myday');
    }

    public function favourite($id){
        $data = MyDay::where('id', $id)->first();
        $data->is_fav = !$data->is_fav;
        $data->save();

        return redirect()->back();
    }

    public function done($id){
        $data = MyDay::where('id', $id)->first();
        $data->is_done = !$data->is_done;
        $data->save();

        return redirect()->back();
    }
}
