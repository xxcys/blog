@extends('layouts.index')
@section('info')
  <title>星溪辰夜的个人博客</title>
  @endsection
@section('content')
    <!-- Hero Section-->
    <section style="background: url(resources/views/index/img/bg.jpeg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h1>一个菜到不行的秃子</h1><a href="#" class="hero-link">Discover More</a>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> 向下滚动</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">一些小介绍</h2>
            <p class="text-big">热爱游戏与动漫，喜欢代码，一个走<strong>后端</strong>的小白。<br>《阴阳师》、《明日方舟》、《王者荣耀》、《崩坏3rd》都很菜
                <br>略懂一些Think PHP与Laravel等后端知识，也很菜
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="featured-posts no-padding-top">
      <div class="container">
        <!-- Post-->
          {{csrf_field()}}
          @foreach($data as $k)
              @if(substr($k->art_id,-2,1)%2!=0)
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="{{url('post/'.$k->art_id)}}">{{$k->art_keywords}}</a><a href="#"></a></div><a href="{{url('post/'.$k->art_id)}}">
                    <h2 class="h4">{{$k->art_title}}</h2></a>
                </header>
                <p>{{$k->art_description}}</p>
                <footer class="post-footer d-flex align-items-center "><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="title"><span>{{$k->art_editor}}</span></div></a>
                  <div class="date"><i class="icon-clock"></i> {{date('Y-m-d',$k->art_time)}}</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="/{{$k->art_thumb}}" alt="..."></div>
        </div>
                  @else
              <!-- Post        -->
                  <div class="row d-flex align-items-stretch">
                      <div class="image col-lg-5"><img src="/{{$k->art_thumb}}" alt="..."></div>
                      <div class="text col-lg-7">
                          <div class="text-inner d-flex align-items-center">
                              <div class="content">
                                  <header class="post-header">
                                      <div class="category"><a href="{{url('post/'.$k->art_id)}}">{{$k->art_keywords}}</a><a href="#"></a></div><a href="{{url('post/'.$k->art_id)}}">
                                          <h2 class="h4">{{$k->art_title}}</h2></a>
                                  </header>
                                  <p>{{$k->art_description}}</p>
                                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                          <div class="title"><span>{{$k->art_editor}}</span></div></a>
                                      <div class="date"><i class="icon-clock"></i> {{date('Y-m-d',$k->art_time)}}</div>
                                  </footer>
                              </div>
                          </div>
                      </div>
                  </div>
              @endif
          @endforeach
      </div>
    </section>
    <div class="tlinks">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
    <!-- Divider Section-->
    <section style="background: url(resources/views/index/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>人生哲言：<br><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如果不是因为菜，谁愿意肝个不停呢</h2><a href="#" class="hero-link">View More</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>最热博客</h2>
          <p class="text-big">博主最热门动态一览</p>
        </header>
        <div class="row">
          @foreach($hot as $v)
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="{{url('post/'.$v->art_id)}}"><img src="/{{$v->art_thumb}}"  alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex align-items-center flex-wrap">
                  <div class="date">{{date('Y-m-d',$v->art_time)}}</div>
                  <div class="views"><i class="icon-eye"></i> {{$v->art_view}}</div>
                  <div class="category"><a href="{{url('post/'.$v->art_id)}}">{{$v->art_keywords}}</a></div>
              </div><a href="{{url('post/'.$v->art_id)}}">
                <h3 class="h4">{{$v->art_title}}</h3></a>
              <p class="text-muted">{{$v->art_description}}</p>
            </div>
          </div>
            @endforeach
        </div>
      </div>
    </section>

    <!-- Gallery Section-->
    <section class="gallery no-padding">    
      <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="resources/views/index/img/gallery-1.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="resources/views/index/img/gallery-2.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="resources/views/index/img/gallery-3.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="resources/views/index/img/gallery-4.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
      </div>
    </section>
@endsection