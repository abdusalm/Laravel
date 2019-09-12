<?php

namespace App\Http\Controllers;

use App\Articles;
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
}
