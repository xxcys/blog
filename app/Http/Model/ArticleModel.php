<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/*
 * 文章模型
 */
class ArticleModel extends Model
{
    //
    protected $table='article';
    protected $primaryKey='art_id';
    public $timestamps=false;
    protected $guarded=[];
}
