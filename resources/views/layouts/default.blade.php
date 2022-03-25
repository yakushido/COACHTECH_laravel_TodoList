<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <style>
    body{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: rgb(38, 38, 150);
    }
    .content{
      background-color: #fff;
      width: 50%;
      margin: 100px auto;
      padding: 20px;
    }
  </style>
</head>
<body>
  
  <div class="content">
    <h1>@yield('title')</h1>
    @yield('content')
  </div>
</body>
</html>