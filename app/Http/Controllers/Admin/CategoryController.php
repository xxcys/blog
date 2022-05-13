<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
/*
 * 分类控制器
 */
class CategoryController extends CommController
{
    //
    public function index()
    {
        $categorys = (new CategoryModel)->tree();

        return view('admin.category.index')->with('data', $categorys);
    }

    //get
    public function create()
    {
        $data = CategoryModel::where('cate_pid', 0)->get();
        return view('admin/category/add', compact('data'));
    }

    //post
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'cate_name' => 'required '
        ];
        $message = [
            'cate_name.required' => '分类名称不能为空'
        ];

        $va = Validator::make($input, $rules, $message);
        if ($va->passes()) {
            $re = CategoryModel::create($input);
            if ($re) {
                return redirect('admin/category');
            } else {
                return back()->withErrors("添加失败");
            }

        } else {
            return back()->withErrors($va);
        }
    }

    //get
    public function edit($cate_id)
    {
       $field = CategoryModel::find($cate_id);
        $data = CategoryModel::where('cate_pid', 0)->get();
        return view('admin/category/edit', compact('field','data'));
    }
    //put
        public function update($cate_id)
        {
            $input = Input::except('_token','_method');
            $res = CategoryModel::where('cate_id',$cate_id)->update($input);
            if ($res){
                return redirect('admin/category');
            }else{
                return back()->withErrors("更新失败");
            }
        }

    //delete
    public function destroy($cate_id)
    {
        $re =CategoryModel::where('cate_id',$cate_id)->delete();
            CategoryModel::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
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
