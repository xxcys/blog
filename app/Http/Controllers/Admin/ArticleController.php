<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\ArticleModel;
use App\Http\Model\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
/*
 * 文章管理
 */
class ArticleController extends CommController
{
    //
    public function index()
    {
        $data=ArticleModel::orderBy('art_id','desc')->paginate(5);
        return view('admin/article/index',compact('data'));
    }

    //get
    public function create()
    {
        $data = (new CategoryModel)->tree();
        return view('admin/article/add', compact('data'));

    }

    //post 添加文章
    public function store()
    {
        $input = Input::except('_token');
        $input['art_time']=time();
        $rules = [
            'art_title' => 'required ',
            'art_content' => 'required '
        ];
        $message = [
            'art_title.required' => '文章标题不能为空',
            'art_content.required' => '文章内容不能为空'
        ];
        $va = Validator::make($input, $rules, $message);
        if ($va->passes()) {
            $re = ArticleModel::create($input);
            if ($re) {
                return redirect('admin/article');
            } else {
                return back()->withErrors("添加失败");
            }
        }else {
            return back()->withErrors($va);
        }

    }

    //get
    public function edit($art_id)
    {
        $data = (new CategoryModel)->tree();
        $field = ArticleModel::find($art_id);
        return view('admin/article/edit', compact('data','field'));
//        $data = CategoryModel::where('cate_pid', 0)->get();
    }
    //put
    public function update($art_id)
    {
        $input = Input::except('_token','_method');
        $res = ArticleModel::where('art_id',$art_id)->update($input);
        if ($res){
            return redirect('admin/article');
        }else{
            return back()->withErrors("更新失败");
        }
    }

    //delete
    public function destroy($art_id)
    {
        $re =ArticleModel::where('art_id',$art_id)->delete();
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
