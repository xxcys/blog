@extends('layouts.index')
@section('info')
  <title>blog list</title>
@endsection
@section('content')
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->
              @foreach($art as $v)
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="{{url('post/'.$v->art_id)}}"><img src="/{{$v->art_thumb}}" alt="..." class="img-fluid" width="100%" height="100px"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{date('Y-m-d',$v->art_time)}}</div>
                    <div class="category"><a href="#">{{$v->art_keywords}}</a></div>
                  </div><a href="{{url('post/'.$v->art_id)}}">
                    <h3 class="h4">{{$v->art_title}}</h3></a>
                  <p class="text-muted">{{$v->art_description}}</p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="title"><span>{{$v->art_editor}}</span></div></a>
                    <div class="comments meta-last"><i class="icon-comment"></i>{{$v->art_view}}</div>
                  </footer>
                </div>
              </div>
              @endforeach
            <!-- Pagination -->
          </div>
            <nav aria-label="Page navigation example">
              {{$art->links()}}
            </nav>
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
              @foreach($art as $v)
              <li class="list-inline-item"><a href="#" class="tag">#{{$v->art_keywords}}</a></li>
              @endforeach
            </ul>
          </div>
        </aside>
      </div>
    </div>
@endsection