<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <script type="text/javascript" src="{{url('js/vector.js')}}"></script>
    <script src="{{asset('js/semantic.js')}}"></script>
</head>
<body>
<div id="container">
    <div id="output">
        <div class="containerT">
            <h1>用户登录</h1>
            <form class="login form" id="entry_form" method="POST" action="loginDo">
                @method('POST')
                @csrf
                <input type="text" placeholder="用户名" id="entry_name" name="user_id" >
                <input type="password" placeholder="密码" id="entry_password" name="password">
                <button type="submit" id="entry_btn" >登录</button>
                <div id="prompt" class="prompt"></div>
                @if(session()->exists('error1'))
                    <div>
                        {{session('error1')}}
                    </div>
                    @endif
            </form>
            <div class="field">
                <div class="ui error message"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        Victor("container", "output");
        $("#entry_name").focus();
        $(document).keydown(function(event){
            if(event.keyCode==13){
                $("#entry_btn").click();
            }
        });
    });
</script>
</body>
</html>
