@extends('layouts.admin')
@section('content')
    <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="{{url('admin/index')}}">首页</a>
                 ><a href="{{url('admin/category')}}">分类管理</a>
                    > <a href="#">分类添加</a>
            </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
        </a>
    </div>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form" action="{{url('admin/category')}}" method="post">
                    {{csrf_field()}}
                        @if(count($errors)>0)
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                <div class="layui-card">
                                    <div class="layui-card-body ">
                                        <blockquote class="layui-elem-quote"> {{$error}}
                                        </blockquote>
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="layui-card">
                                <div class="layui-card-body ">
                                    <blockquote class="layui-elem-quote"> {{$errors}}
                                    </blockquote>
                                </div>
                            </div>
                            @endif
                    @endif
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            父级分类</label>
                        <div class="layui-input-inline">
                            <select id="shipping" name="cate_pid" class="valid">
                                <option value="0">父级</option>
                                @foreach($data as $d)
                                <option value="{{$d->cate_id}}">{{$d->cate_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
            <div class="layui-form-item">
                <label  class="layui-form-label">
                    <span class="x-red"></span>分类名称</label>
                <div class="layui-input-inline">
                    <input type="text" id="category" name="cate_name" autocomplete="off" class="layui-input" ></div>
            </div>
             <div class="layui-form-item">
                        <label  class="layui-form-label">
                            <span class="x-red"></span>分类标题</label>
                        <div class="layui-input-inline">
                            <input type="text" id="category" name="cate_title" autocomplete="off" class="layui-input" ></div>
            </div>
            <div class="layui-form-item">
                        <label  class="layui-form-label">
                            <span class="x-red"></span>分类内容</label>
                        <div class="layui-input-inline">
                            <input type="text" id="category" name="cate_content" autocomplete="off" class="layui-input" ></div>
              </div>
            <div class="layui-form-item">
                <label  class="layui-form-label"></label>
                <button class="layui-btn" lay-filter="create" lay-submit="create">添加</button></div>
        </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                // //自定义验证规则
                // form.verify({
                //     nikename: function(value) {
                //         if (value.length < 5) {
                //             return '昵称至少得5个字符啊';
                //         }
                //     },
                //     pass: [/(.+){6,12}$/, '密码必须6到12位'],
                //     repass: function(value) {
                //         if ($('#L_pass').val() != $('#L_repass').val()) {
                //             return '两次密码不一致';
                //         }
                //     }
                // });

                // //监听提交
                // form.on('submit(add)',
                // function(data) {
                //     console.log(data);
                //     //发异步，把数据提交给php
                //     layer.alert("增加成功", {
                //         icon: 6
                //     },
                //     function() {
                //         //关闭当前frame
                //         xadmin.close();
                //
                //         // 可以对父窗口进行刷新
                //         xadmin.father_reload();
                //     });
                //     return false;
                // });

            });</script>
@endsection
