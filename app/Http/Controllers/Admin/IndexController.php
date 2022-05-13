<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommController;
use App\Http\Model\UserModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


/*
 * 后台管理首页控制器
 */

class IndexController extends CommController
{
    public function index()
    {
        return view('admin.index');
    }

    public function welcome()
    {
        return view('admin.welcome');
    }

    /*
     * 修改密码
     */
    public function pass()
    {
        if ($input = Input::all()) {
            $rules=[
                'password'=>'required '
            ];
            $message=[
                'password.required'=>'密码不能为空'
            ];
           $va=Validator::make($input,$rules,$message);
           if ($va->passes()){
              $user=UserModel::first();
              $_password=Crypt::decrypt($user->password);
              if ($input['password_o']==$_password){
                  $user->password=Crypt::encrypt($input['password']);
                  $user->update();
                  session(['user'=>null]);
                  return back()->withErrors('密码修改成功');
              }else{
                  return back()->withErrors('原密码错误');
              }
           }else{
               return back()->withErrors($va);
           }
        } else {
            return view('admin.pass');
        }

    }
}
