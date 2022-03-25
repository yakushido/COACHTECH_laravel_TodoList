@extends('layouts.default')
@section('title','Todo List')
<style>
  form{
    text-align: center;
  }
  table{
    margin: 0 auto;
  }
  th{
    width: 20%;
  }
</style>
@section('content')
  <form method="POST">
    @csrf
    <input type="text" name="content"><button formaction="{{route('todo.create')}}">追加</button>
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
          <td>{{$item->content}}</td>
          <td><button>更新</button></td>
          <td>
            <form method="POST">
              @csrf
              <button formaction= >削除</button>
            </form>
          </td>
        </tr>
      @endforeach
  </table>
@endsection