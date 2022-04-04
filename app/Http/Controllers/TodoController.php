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
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

    public function delete(Todo $id)
    {
        $id->delete();
        return redirect('/');
    }

    public function update(Todo $id, ClientRequest $request)
    {
        $update_data = $id->first();
        $update_data->update(['content' => $request->update_content]);
        return redirect('/');
        // echo $update_data;
    }
}
