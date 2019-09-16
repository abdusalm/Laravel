<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>****大学</title>
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
                                <a href="update" class="item">修改个人信息</a>
                            </div>
                        </div>
                        <a href="collectionShell" class="ui label" style="margin-left: 10px">收藏夹</a>
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
    <div class="ui divider"></div>
    @if(session()->exists('success'))
        <div class="ui blue header">{{session('success')}}</div>
    @endif
    <div class="ui fluid three item menu">
        <a class="item"><div class="ui red header">标题：{{$arti->title}}</div></a>
        <a class="item"><div class="ui header">上传者：{{$arti->publisher['username']}}</div></a>
        <a class="item">点击次数：{{$arti->hits}}次</a>
    </div>
    <h2 class="ui blue header">描述</h2>
    <div class="ui  segment">
        {!! $arti->discription !!}
    </div>
    <div class="right floated content">
            <div class="ui right floated red button" cur_id="{{$arti->id}}" id="collect">收藏</div>
    </div>
    <h2 class="ui green header">内容</h2>
    <div class="ui stacked segment">
        {!! $arti->content !!}
    </div>
</div>
<div class="ui divider"></div>
</body>
<script>
    $(function () {
        $('#collect').click(function () {
            var cur_id=$('#collect').attr('cur_id');
            document.location.href='collect?'+'id='+cur_id;
        });
    });
</script>
</html>
