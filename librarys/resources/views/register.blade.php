<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>****大学</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/semantic.css')}}">
    <script src="{{asset('js/semantic.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.ui.form')
                .form({
                    fields: {
                        username: {
                            identifier: 'username',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : '请输入用户昵称'
                                }
                            ]
                        },
                        motto: {
                            identifier: 'motto',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : '请输入个性签名'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : '请输入密码'
                                },
                                {
                                    type   : 'minLength[6]',
                                    prompt : '密码长度至少6位'
                                }
                            ]
                        },
                    }
                })
            ;
                })

    </script>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-image: url({{asset('img/back.jpg')}});
            background-size: cover;

        }
        .kuo{
            position: absolute;
            margin: 12%  32%;
        }
    </style>
</head>
<body>
<div class="kuo">
    <form class="ui form segment" action="registerDo" method="post" style="width: 500px">
        @csrf
        @method('POST')
        <div class="field">
            <center>
                <div class="ui header">用户注册</div>
            </center>
        </div>
        <div class="field">
            <label>用户昵称</label>
            <input placeholder="用户昵称" name="username" type="text">
        </div>
        <div class="field">
            <label>个性签名</label>
            <input placeholder="个性签名" name="motto" type="text">
        </div>
        <div class="field">
            <label>密码</label>
            <input name="password" id="password" type="password">
        </div>
{{--        <div class="field">--}}
{{--            <label>确认密码</label>--}}
{{--            <input id="repassword" type="password">--}}
{{--        </div>--}}
        <center><div class="ui primary submit button">注册</div><a href="login">我已有账号，去登录</a></center>
        <div class="ui error message"></div>
    </form>
</div>

</body>
</html>
