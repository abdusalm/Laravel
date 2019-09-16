<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Collection;
use App\Course;
use App\UserInfo;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class PublishController extends Controller
{
    //
    public function publishDo(Request $request){
        $title=$request->title;
        $discription=$request->discription;
        $co_id=$request->co_id;
        $t_id=session('user')['user_id'];
        $content=$request->con;
        Articles::create([
            'title'=>$title,
            'discription'=>$discription,
            'co_id'=>$co_id,
            't_id'=>$t_id,
            'content'=>$content,
            'hits'=>0
        ]);
        $data=[
            'content'=>Articles::get()
        ];
        session()->flash('success','上传成功！');
        return $this->publish();
    }
    public function publish(){
        $count=Articles::query()->where('t_id',session('user')['user_id'])->count();
        $hits=Articles::query()->where('t_id',session('user')['user_id'])->sum('hits');
        $courses=Course::get();
        $data=[
            'courses'=>$courses,
            'count'=>$count,
            'hits'=>$hits
        ];
        return view('publish',$data);
    }
    public function edit(Request $request){
        $count=Articles::query()->where('t_id',session('user')['user_id'])->count();
        $hits=Articles::query()->where('t_id',session('user')['user_id'])->sum('hits');
        $courses=Course::get();
        $article=Articles::query()->where('id',$request->id)->first();
        $data=[
            'arti'=>$article,
            'courses'=>$courses,
            'count'=>$count,
            'hits'=>$hits
        ];
        return view('Editarticle',$data);
    }
    public function editDo(Request $request){
        $id=$request->id;
        $title=$request->title;
        $discription=$request->discription;
        $co_id=$request->co_id;
        $t_id=session('user')['user_id'];
        $content=$request->con;
        Articles::query()->where('id',$id)->update([
            'title'=>$title,
            'discription'=>$discription,
            'co_id'=>$co_id,
            'content'=>$content
        ]);
        session()->flash('success','修改成功');
        $articles=Articles::query()->where('t_id',session('user')['user_id'])->orderByDesc('hits')->get();
        if($articles->isEmpty()){
            session()->flash('error2','没有相关文章发布');
        }
        $data=[
            'artcles'=>$articles
        ];
        return view('ownArticle',$data);
    }
    public function deleteDo(Request $request){
        Articles::query()->where('id',$request->id)->delete();
        Collection::query()->where('article_id',$request->id);
        $articles=Articles::query()->where('t_id',session('user')['user_id'])->orderByDesc('hits')->get();
        if($articles->isEmpty()){
            session()->flash('error2','没有相关文章发布');
        }
        $data=[
            'artcles'=>$articles
        ];
        return view('ownArticle',$data);
    }
}
