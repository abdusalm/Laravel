<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>发布文章</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/simditor.css')}}">
    <link rel="stylesheet" href="{{asset('css/semantic.css')}}">
    <script src="{{asset('js/semantic.js')}}"></script>
    <script src="{{asset('js/self.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/module.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/hotkeys.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/uploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/simditor.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var editor=new Simditor({
                toolbar: [
                    'title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale',
                    'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link',
                    'image', 'hr', '|', 'alignment'
                ],
                textarea: $('#editor'),
            });
            $('#select').dropdown();
            $('.ui.form')
                .form({
                    fields: {
                        title: {
                            identifier: 'title',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : '请输入标题'
                                }
                            ]
                        },
                        discription: {
                            identifier: 'discription',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : '请添加描述'
                                }
                            ]
                        },
                        password: {
                            identifier: 'editor',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : '请输入文章内容'
                                },
                            ]
                        },
                    }
                })
            ;
        });
    </script>
</head>
<body>
<div class="ui container">
    <div class="ui divider"></div>
    @if(session()->exists('success'))
        <div class="ui blue header">{{session('success')}}</div>
    @endif
    <div class="ui middle aligned divided list">
        <div class="item">
            <div class="right floated  content">
                <div style="height: 20px"></div>
                <a href="home" ><div class="ui blue header">返回首页</div></a>
            </div>
            <img class="ui tiny image" src="{{url('img/logo.jpg')}}">
            <div class="content"><span class="ui header">*****大学文库</span> </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui red divider"></div>
            <div style="resize: none;width: 260px;height: 637px" class="ui card">
                <div class="content">
                    <div class="right floated meta">
                    </div>
                    <img class="ui avatar img" src="{{url('img/touxiang.jpg')}}" alt="">
                    {{session('user')['username']}}
                </div>
                <div class="image">
                    <img src="{{url('img/touxiang.jpg')}}" >
                </div>
                <div class="content">
                    <div class="ui red label">发布文章次数</div>
                    <span>{{$count}}次</span><p></p>
                    <div class="ui red label">点击总次数：</div>
                    <span >{{$hits}}次</span>
                </div>
                <div class="extra content">
                    <div class="ui tall stacked segment">
                        <h4 class="ui header">个人简介</h4>
                        <p>
                            {{session('user')['resume']}}
                        </p>
                        <button class="fluid ui  button" id="update" type="submit">修改个人信息</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="twelve wide column ">
            <form action="editDo" class="ui form" method="post" id="form">
                @csrf
                @method('POST')
                <div class="ui  list">
                    <div class="item">
                        <div class="ui input focus">
                            <input name="title" id="title" type="text"  placeholder="请输入标题！！" value="{{$arti->title}}" >
                        </div>
                        <select class="ui dropdown  courses"  name="co_id" id="select">
                            @foreach($courses as $course)
                                <option value="{{$course->co_id}}">{{$course->co_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="ui fluid input">
                    <div class="ui label">
                        <div class="ui header">内容描述：</div>
                    </div>
                    <textarea name="discription" type="text" id="dicsription" style="width: 730px;height: 80px;resize: none"
                              placeholder="请输入一段文章描述（150字左右）">{!! $arti->discription !!}</textarea>
                </div>
                <input type="text" name="id" hidden value="{{$arti->id}}">
                <div class="ui  divider"></div>
                <textarea id="editor" name="con">{!! $arti->content !!}}</textarea>
                <div class="fluid ui submit blue button">保存修改</div>
                <div class="ui error message"></div>
            </form>
        </div>
    </div>
    <div class="ui divider"></div>
</div>
</body>
<script>
    $(function () {
        $('#update').click(function () {
            document.location.href='update';
        });
    });
</script>
</html>
