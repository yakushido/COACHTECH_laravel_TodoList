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

    public function delete(Todo $id)
    {
        $id->delete();
        return redirect('/');
    }

    public function update(Todo $id, Request $request)
    {
        $update_data = $id->first();
        $update_data->update(['content' => $request->update_content]);
        return redirect('/');
        // echo $update_data;
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'content' => 'required|max:20'
        ];
        $this->validate($request, $validate_rule);
        return redirect('/');
    }
}
