<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>****大学</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/semantic.css')}}">
    <script src="{{asset('js/semantic.js')}}"></script>
</head>
<body>
<div class="ui container">
    <div class="ui raised segment">
        <p><span class="ui header">注册成功！</span></p>
        <div>
            您的用户账号：<h2>{{$user_id}}</h2>
        </div>
        <div>用户名：<h2>{{$username}}</h2></div>
        <p><h2  class="ui red header">请记住你的用户账号！登录所需</h2></p>
        <a href="login">去登录---</a>
    </div>
</div>
</body>
</html>

