<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Encryption\DecryptException;
/*
 * 登录控制器
 */
class LoginController extends CommController
{
    public function login()
    {
        if ($input=Input::all()){
            $list=UserModel::first();
            if ( $list->username!=$input['username'] || Crypt::decrypt($list->password) != $input['password']){
                return back()->with('msg','用户名或密码错误');
            }
            session(['user'=>$list]);
                return redirect('admin/index');


        }else{
            return view('admin.login');
        }

    }
    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }
    public function crypt()
    {
        $str_p='eyJpdiI6ImJ0bW1tQVJIeHZ5NUdYYXJlbEl6ZFE9PSIsInZhbHVlIjoiNWd3em0rNHhqWEhmYWgzUXR5YTJaQT09IiwibWFjIjoiODJlNmQxYjY0MzYzMzFhZDJhM2YwYWE2ZWI5YmEwZGJiYzRmMDUzZDU1MjgwMjQ5MDIzYzE0YjUyN2IzNzMwYSJ9';

//        echo Crypt::decrypt($str_p);//解密
//        echo Crypt::encryptString($str_p);//加密
        try {
            echo   Crypt::decryptString($str_p);
        } catch (DecryptException $e) {
            //
            echo $e;
        }

    }
}
