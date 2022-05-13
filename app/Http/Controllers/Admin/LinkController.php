<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\LinkModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinkController extends CommController
{
    public function index()
    {
        $data=LinkModel::orderBy('link_order','asc')->get();
        return view('admin/link/index',compact('data'));
    }

    //get
    public function create()
    {
        $data = LinkModel::all();
        return view('admin/link/add');

    }

    //post 添加文章
    public function store()
    {
        $input = Input::except('_token');

        $rules = [
            'link_title' => 'required ',
            'link_name' => 'required ',
            'link_url' => 'required '
        ];
        $message = [
            'link_title.required' => '描述不能为空',
            'link_name.required' => '名字不能为空',
            'link_url.required' => '链接不能为空',
        ];
        $va = Validator::make($input, $rules, $message);
        if ($va->passes()) {
            $re = LinkModel::create($input);
            if ($re) {
                return redirect('admin/link');
            } else {
                return back()->withErrors("添加失败");
            }
        }else {
            return back()->withErrors($va);
        }

    }

    //get
    public function edit($link_id)
    {
        $data = LinkModel::find($link_id);
        return view('admin/link/edit', compact('data'));
//        $data = CategoryModel::where('cate_pid', 0)->get();
    }
    //put
    public function update($link_id)
    {
        $input = Input::except('_token','_method');
        $res = LinkModel::where('link_id',$link_id)->update($input);
        if ($res){
            return redirect('admin/link');
        }else{
            return back()->withErrors("更新失败");
        }
    }

    //delete
    public function destroy($link_id)
    {
        $re =LinkModel::where('link_id',$link_id)->delete();
        if ($re){
            $data=[
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }


}
