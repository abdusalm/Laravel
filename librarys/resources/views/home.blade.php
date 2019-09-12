<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>****大学首页</title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/semantic.css')}}">
        <script src="{{asset('js/semantic.js')}}"></script>
        <script src="{{asset('js/self.js')}}"></script>
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
                                    <a href="update" class="item"><div class="ui blue label">修改个人信息</div></a>
                                </div>
                            </div>
                            <a href="#" class="ui label" style="margin-left: 10px">收藏夹</a>
                            @if(session('user')['role']=='teacher')
                                <a href="owns" class="ui label">我的文章</a>
                                <a href="publish" class="ui label" style="margin-left: 10px">发布文章</a>
                            @endif
                            <a href="exit" class="ui red label" style="margin-left: 10px">退出登录</a>
                        </div>
                    @else
                    <a href="login"><span class="ui label">登录</span></a>
                    <a href="register"><span class="ui label">注册</span></a>
                    <a href="#"><span class="ui label">帮助</span></a>
                    @endif
                </div>
                <img class="ui tiny image" src="{{url('img/logo.jpg')}}">
                <div class="content"><span class="ui header">*****大学文库</span> </div>
                <div class="ui action input" style="margin-left: 150px">
                    <input type="text" placeholder="请输入关键词" id="key">
                    <select class="ui compact selection dropdown" id="limits">
                        <option selected="" value="articles">文章</option>
                        <option value="tName">教师</option>
                    </select>
                    <div class="ui blue  button" id="search">搜索</div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui container">
        <div class="column">
            <div class="ui raised segment">
                @foreach($ins as $ins)
                <a class="ui red ribbon label">{{$ins->ins_name}}</a>
                <p></p>
                @foreach($ins->majors as $major)
                <a  cur_major_id="{{$major->major_id}}" class="ui blue tag label major">{{$major->major_name}}:</a>
                    @foreach($major->courses as $course)
                <a   cur_co_id="{{$course->co_id}}" class="ui green label course">{{$course->co_name}}</a>
                        @endforeach
                <p></p>
                    @endforeach
                    @endforeach
            </div>
        </div>
    </div>
    </body>
</html>
