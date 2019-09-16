<?php

namespace App\Http\Controllers;

use App\Institute;
use App\UserInfo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $ins=Institute::with(['majors'=>function($query){
            return $query->with(['courses']);
        }])->get();
        $data=[
            'ins'=>$ins
        ];
//        dd($data);
        return view('home',$data);
    }
    public function register(){
        return view('register');
    }
    public function registerDo(Request $request){
        $num=UserInfo::get()->last();
        if(!$num){
            $num=0;
        }
        else{
            $num=$num->id;
        }
        $num=100000+$num+1;
        $user_id='stu'.$num;
        UserInfo::create([
            'username'=>$request->username,
            'user_id'=>$user_id,
            'password'=>encrypt($request->password),
            'motto'=>$request->motto,
            'resume'=>'我是一名学生',
            'role'=>'student'

        ]);
        $data=[
            'user_id'=>$user_id,
            'username'=>$request->username
        ];
        return view('regSuccess',$data);
    }

    public function loginDo(Request $request){
        $user_id=$request->user_id;
        $password=$request->password;
        $user_info=UserInfo::where('user_id',$user_id)->first();
        if(!$user_info){
            session()->flash('error1','没有此用户，请核对后重新登录');
            return redirect('login');
        }
        $user=decrypt(UserInfo::where('user_id',$user_id)->first()->password);
        if($user==$password){
           $user=UserInfo::where('user_id',$user_id)->first();
          session()->put('user',$user);
          return redirect('/');
        }
        session()->flash('error1','密码错误，请核对后重新登录');
        session()->flash('user_id',$user_id);
        return redirect('login');
    }

    public function update(Request $request){
        UserInfo::query()->where('user_id',session('user')['user_id'])->update([
            'username'=>$request->username,
            'password'=>encrypt($request->password),
            'motto'=>$request->motto,
            'resume'=>$request->resume
        ]);
        $user=UserInfo::where('user_id',session('user')['user_id'])->first();
        session()->forget('user');
        session()->put('user',$user);
        session()->flash('success2','修改成功');
        return view('userinfo');
    }
    public function back(){
        return redirect('/');
    }
    public function exit(){
        session()->flush();
        return redirect('/');

    }
}
