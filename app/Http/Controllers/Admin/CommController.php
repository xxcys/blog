<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CommController extends Controller
{
    //图片上传
    public function upload()
    {
        $file =Input::file('Filedata');
        if ($file -> isValid())
        {
            $realPath=$file->getRealPath();
            $entension=$file->getClientOriginalExtension();//上传文件的后缀
            $newName=date('YmdHis').mt_rand(100,900).'.'.$entension;
            $path=$file->move(base_path().'/uploads',$newName);
            $filepath='blog/uploads/'.$newName;
            return $filepath;
        }
    }
}
