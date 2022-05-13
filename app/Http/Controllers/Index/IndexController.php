<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\ArticleModel;
use App\Http\Model\CategoryModel;
use App\Http\Model\LinkModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommController
{
    //
    public function index()
    {
        //点击最多
        $hot=ArticleModel::orderBy('art_view','desc')->take(3)->get();
        //最新文章
        $data=ArticleModel::orderBy('art_time','desc')->take(3)->get();
        //分类
        return view('Index.index',compact('hot','data','url'));
    }
    public function list()
    {
        $cate=(new CategoryModel())->tree();
        $art=ArticleModel::orderBy('art_time','desc')->paginate(4);
        return view('Index.list',compact('cate','art','url'));
    }

    public function cate($cate_id)
    {
        $cate=(new CategoryModel())->tree();
        $filed=CategoryModel::find($cate_id);
        //查看次数
        CategoryModel::where('cate_id',$cate_id)->increment('cate_view');
        $fcate=ArticleModel::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);
        return view('Index.cate',compact('filed','fcate','cate'));
    }
    public function post($art_id)
    {
        //$filed=ArticleModel::find($art_id);
        $filed=ArticleModel::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
        $cate=(new CategoryModel())->tree();
        //查看次数
        ArticleModel::where('art_id',$art_id)->increment('art_view');
        $article['pre']=ArticleModel::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next']=ArticleModel::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
        return view('Index.post',compact('filed','cate','article'));
    }
}
