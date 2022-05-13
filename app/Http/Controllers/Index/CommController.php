<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\LinkModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommController extends Controller
{
    //
    public function __construct()
    {
        $url=LinkModel::orderBy('link_order','asc')->get();

        View::share('url',$url);
    }
}
