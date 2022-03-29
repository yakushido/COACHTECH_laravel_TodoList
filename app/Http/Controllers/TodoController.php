<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }


    public function delete(Request $request)
    {
        $item_id = Todo::find($request->id);
        $item_id->delete();
        return redirect('/');
    }

    // public function update($item)
    // {   
    //     $items = Todo::all();
    //     Todo::where('id', $items->id)->update($items);
    //     return redirect('/',['items' => $items]);
    // }
}
