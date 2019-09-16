<?php

namespace App\Http\Controllers;

use App\Collection;
use App\UserInfo;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    //
    public function collect(Request $request){
        $collection=Collection::query()->where('article_id',$request->id)
            ->where('user_id',session('user')['user_id'])->first();
        if($collection){
            session()->flash('success','你已经收藏过此文章！');
            return redirect('article?'.'id'.'='.$request->id);
        }
        else {
            Collection::create([
                'article_id' => $request->id,
                'user_id' => session('user')['user_id']
            ]);
            session()->flash('success','收藏成功!');
            return redirect('article?'.'id'.'='.$request->id);
        }
    }
    public function collections(){
        $collections=UserInfo::with(['collections'=>function($query){
            return $query->with(['publisher']);
        }])->where('user_id',session('user')['user_id'])->get();
//        dd($collections);
        if ($collections) {
            $data = [
                'user' => $collections
            ];
            session()->flash('hasCollection','d');
            return view('collectionShell',$data);
        }
        else{
            session()->flash('blankCollection','你还没收藏任何文章哟！');
            return view('collectionShell');
        }
    }
}
