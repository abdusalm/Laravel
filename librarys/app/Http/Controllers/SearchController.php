<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Major;
use App\UserInfo;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function courses(Request $request){

        $co_id=$request->co_id;
        $artcles=Articles::with(['publisher'])->where('co_id',$co_id)->orderByDesc('hits')->get();
        if($artcles->isEmpty()){
            session()->flash('error2','没有相关文章发布');
        }
        $data=[
            'artcles'=>$artcles
        ];
        return view('searchResult',$data);
    }
    public function majors(Request $request){
        $artcles=Major::find($request->major_id)->articles()->get();
        if($artcles->isEmpty()){
            session()->flash('error2','没有相关文章发布');
        }
        $data=[
            'artcles'=>$artcles
        ];
        return view('searchResult',$data);
    }

    public function searchAll(Request $request){
        $key=$request->key;
        $limits=$request->limits;
        if($limits=='articles'){
            $artcles=Articles::with(['publisher'])->where('title','like','%'.$key.'%')->orderByDesc('hits')->get();
            if($artcles->isEmpty()){
                session()->flash('error2','没有相关文章发布');
            }
            $data=[
                'artcles'=>$artcles
            ];
            return view('searchResult',$data);
        }

        $publisher=UserInfo::with(['articles'])->where('role','teacher')->where('username','like','%'.$key.'%')->get();
        if($publisher->isEmpty()){
            session()->flash('error2','没有相关文章发布');
        }
        $data=[
            'publisher'=>$publisher
        ];
        return view('searchR',$data);
    }

    public function getOne(Request $request){
        $id=$request->id;
        $arti=Articles::with(['publisher'])->where('id',$id)->first();
        Articles::query()->where('id',$id)->update(['hits'=>$arti->hits+1]);
        $data=[
            'arti'=>$arti
        ];
        return view('articleContent',$data);
    }
    public function owns(){
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
