<?php

namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class LinkModel extends Model
{
    //
    protected $table='links';
    protected $primaryKey='link_id';
    public $timestamps=false;
    protected $guarded=[];
}
