@section('add')
  <form action="/todo/create" method="POST">
    @csrf
    <input type="text" name="content"><button>追加</button>
  </form>  
@endsection