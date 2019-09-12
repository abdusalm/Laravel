<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>修改个人信息</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/semantic.css')}}">
    <script src="{{asset('js/semantic.js')}}"></script>

</head>
<body>
<div class="ui container">
    <div class="ui middle aligned divided list">
        <div class="item">
            <div class="right floated  content">
                <div style="height: 20px"></div>
                @if(session()->has('user'))
                    <div class="right floated  content">
                        <div class="ui dropdown">
                            <div class="text">{{session('user')['username']}}</div>
                            <div class="menu">
                                <a href="update" class="item">修改个人信息</a>
                            </div>
                        </div>
                        <a href="#" class="ui label" style="margin-left: 10px">收藏夹</a>
                        @if(session('user')['role']=='teacher')
                            <a href="owns" class="ui label">我的文章</a>
                            <a href="publish" class="ui label" style="margin-left: 10px">发布文章</a>
                        @endif
                        <a href="home" class="ui red label" style="margin-left: 10px">返回首页</a>
                    </div>
                @else
                    <a href="login"><span class="ui label">登录</span></a>
                    <a href="register"><span class="ui label">注册</span></a>
                    <a href="#"><span class="ui label">帮助</span></a>
                @endif
            </div>
            <img class="ui tiny image" src="{{url('img/logo.jpg')}}">
            <div class="content"><span class="ui header">*****大学文库</span> </div>
        </div>
    </div>
</div>
<div class="ui container">
    @if(session()->exists('success2'))
        <span class="ui blue header">{{
        session('success2')
        }}</span>
    @endif
    <form class="ui form" action="updateDo" method="post">
        @csrf
        @method('POST')
        <table class="ui selectable celled table">
            <tbody>
            <tr>
                <td>用户名:</td>
                <td><input id="username"  name="username" type="text" value="{{session('user')['username']}}"></td>
            </tr>
            <tr>
                <td>*输入旧密码:</td>
                <td><input id="re_password"  type="password"></td>
            </tr>
            <tr>
                <td>*新密码:</td>
                <td><input id="password" name="password" type="password"></td>
            </tr>
            <tr>
                <td>座右铭:</td>
                <td><input id="motto" name="motto" type="text" value="{{session('user')['motto']}}"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="ui header">个人简历</div>
                    <textarea name="resume" id="" cols="30" rows="10">
                        {{session('user')['resume']}}"
                    </textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="update" class="fluid ui blue button">确认修改</div>
                </td>
            </tr>
            </tbody>
        </table>
        <input id="cur_password" hidden  value="{{decrypt(session('user')['password'])}}">
    </form>
</div>
</body>
<script>
    $(function () {
        $('#update').click(function () {
            var old_password=$('#cur_password').val();
            var re_password=$('#re_password').val();
            if(old_password!=re_password){
                alert(old_password);
            }
            else{
                var password=$('#password').val();
                if(password==''){
                    $('#password').val(old_password);
                    $('.ui.form').submit();
                }
                else {
                    $('.ui.form').submit();
                }
            }
        });
    });
</script>
</html>
