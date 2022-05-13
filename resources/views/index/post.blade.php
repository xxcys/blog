@extends('layouts.index')
@section('info')
  <title>{{$filed->art_title}}</title>
@endsection
@section('content')
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="{{url('/')}}">首页</a>><a href="#">{{$filed->cate_name}}</a></div>
                </div>
                <h1>{{$filed->art_title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"></div>
                    <div class="title"><span>{{$filed->art_editor}}</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i> {{date('Y-m-d',$filed->art_timr)}}</div>
                    <div class="views"><i class="icon-eye"></i> {{$filed->art_view}}</div>
                  </div>
                </div>
                <div class="post-body">
                {!! $filed->art_content !!}
                </div>
              <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                  @if($article['pre'])
                  <a href="{{url('post/'.$article['pre']->art_id)}}" class="prev-post text-left d-flex align-items-center">
                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                    <div class="text"><strong class="text-primary">上一篇 </strong>
                      <h6>{{$article['pre']->art_title}}</h6>
                    </div></a>
                  @else
                      <h6 class="prev-post text-left d-flex align-items-center">没有上一篇了</h6>
                  @endif
                  @if($article['next'])
                  <a href="{{url('post/'.$article['next']->art_id)}}" class="next-post text-right d-flex align-items-center justify-content-end">
                    <div class="text"><strong class="text-primary">下一篇</strong>
                      <h6>{{$article['next']->art_title}}</h6>
                    </div>
                    <div class="icon next"><i class="fa fa-angle-right"></i></div></a>
                      @else
                          <h6 class="prev-post text-left d-flex align-items-center">没有下一篇了</h6>
                  @endif
              </div>
              </div>
            </div>
          </div>
        </main>
          <aside class="col-lg-4">
              <!-- Widget [Categories Widget]-->
              <div class="widget categories">
                  <header>
                      <h3 class="h6">分类列表</h3>
                  </header>
                  @foreach($cate as $v)
                      <div class="item d-flex justify-content-between"><a href="{{url('cate/'.$v->cate_id)}}">{{$v->_cate_name}}</a></div>
                  @endforeach
              </div>
              <!-- Widget [Tags Cloud Widget]-->
              <div class="widget tags">
                  <header>
                      <h3 class="h6">Tags</h3>
                  </header>
                  <ul class="list-inline">
                          <li class="list-inline-item"><a href="#" class="tag">#{{$filed->art_keywords}}</a></li>
                  </ul>
              </div>
          </aside>
      </div>
    </div>
@endsection