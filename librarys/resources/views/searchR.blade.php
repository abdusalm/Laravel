<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>**大学</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/semantic.css')}}">
    <script src="{{asset('js/semantic.js')}}"></script>
    <script src="{{asset('js/self.js')}}"></script>
    <script>
        $(document).ready(function () {
            window.location.reload();
        });
    </script>
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
            <div class="ui action input" style="margin-left: 150px">
                <input type="text" id="key" placeholder="请输入关键词">
                <select class="ui compact selection dropdown"  id="limits">
                    <option selected="" value="articles">文章</option>
                    <option value="teacher">教师</option>
                </select>
                <div class="ui blue button" id="search">搜索</div>
            </div>
        </div>
    </div>
</div>
<div class="ui container">
    <table class="ui selectable celled table">
        <thead>
        <tr>
            <th rowspan="2">文章名</th>
            <th>上传者</th>
            <th>发布日期</th>
            <th>点击量</th>
        </tr>
        </thead>
        <tbody>
        @foreach($publisher as $publisher)
            @foreach($publisher->articles as $article)
        <tr class="artcle" arti_id="{{$article->id}}">
            <td>{{$article->title}}</td>
            <td>{{$publisher->username}}</td>
            <td>{{$article->created_at}}</td>
            <td>{{$article->hits}}次</td>
        </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
    <div class="field">
        @if(session()->exists('error2'))
            <span>{{session('error2')}}</span>
        @else
            <span>没有更多的检索结果</span>
        @endif
    </div>
</div>
</body>
</html>
