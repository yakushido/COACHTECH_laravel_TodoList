<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\ClientRequest;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
        return view('index', ['items' => $items]);
    }

    public function create(ClientRequest $request)
    {
        Todo::create([
            'content' => $request->newContent
        ]);
        return redirect('/');
    }

    public function delete(Todo $id)
    {
        $id->delete();
        return redirect('/');
    }

    public function update(Request $request,$id)
    {
        $update_data = Todo::find($id);
        $update_data->content = $request->updateContent;
        $update_data->save();
        return redirect('/');
        // echo $update_data;
    }
}
