@extends('layouts.default')
@section('title','Todo List')
<style>
  form{
    text-align: center;
  }
  table{
    margin: 0 auto;
    width: 100%;
  }
  th:nth-child(1),
  td:nth-child(1),
  th:nth-child(2),
  td:nth-child(2){
    width: 30%;
    text-align: center;
  }
  th:nth-child(3),
  td:nth-child(3),
  th:nth-child(4),
  td:nth-child(4){
    width: 10%;
    text-align: center;
  }
  .update_button,
  .delete_button{
    width: 100%;
    height: 50px;
    border-radius: 5px;
    background-color: white;
  }
  .update_button{
    border: 2px solid purple;
    color: purple;
  }
  .delete_button{
    border: 2px solid aqua;
    color: aqua;
  }
  .add_input,
  .update_input{
    border: 2px solid rgba(128, 128, 128, 0.5);
    border-radius: 5px;
  }
  .add_input{
    height: 40px;
    width: 80%;
  }
  .add_button{
    border: 2px solid rgb(250, 150, 150);
    border-radius: 5px;
    background-color: white;
    color: rgb(250, 150, 150);
    height: 40px;
    width:20%;
  }
  .update_input{
    height: 30px;
    width: 90%;
  }
  button:hover{
    cursor: pointer;
  }
  .todoList_content{
    width: 100%;
  }
  
</style>
@section('content')
<div class="todoList_content">
  <form class="add" method="POST">
    @csrf
    <input class="add_input" type="text" name="content"><button class="add_button" formaction="{{route('todo.create')}}">追加</button>
  </form>
  <table class="content_table">
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach ($items as $item)
    <tr>
      <td>{{$item->created_at}}</td>

        {{-- 更新機能 --}}
      <form method="POST" action="{{route('todo.update',['id' => $item->id])}}">
      @csrf
        <td><input class="update_input" type="text" name="update_content" value="{{$item->content}}"></td>
        <td><button class="update_button">更新</button></td>
      </form>
        {{-- 更新機能の終わり --}}

        {{-- 削除機能 --}}
      <form method="POST" action="{{route('todo.delete',$item->id)}}">
      @csrf
        <td><button class="delete_button">削除</button></td>
      </form>
        {{-- 削除機能の終わり --}}
    </tr>
    @endforeach
  </table>
</div>
@endsection