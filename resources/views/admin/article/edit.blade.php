@extends('layouts.admin')
@section('content')
    <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="{{url('admin/index')}}">首页</a>
                 ><a href="{{url('admin/article')}}">文章管理</a>
                    > <a href="#">文章修改</a>
            </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
        </a>
    </div>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form" action="{{url('admin/article/'.$field->art_id)}}" method="post">
                    <input type="hidden" name="_method" value="put">
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
                            分类</label>
                        <div class="layui-input-inline">
                            <select id="shipping" name="cate_id" class="valid">
                                @foreach($data as $d)
                                    <option value="{{$d->cate_id}}"
                                            @if($d->cate_id==$field->cate_id)selected @endif
                                    >{{$d->_cate_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="art_title" class="layui-form-label">
                            <span class="x-red">*</span>文章标题：</label>
                        <div class="layui-input-inline">
                            <input type="text" id="art_title" name="art_title" autocomplete="off" class="layui-input" value="{{$field->art_title}}"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>发布人：</label>
                        <div class="layui-input-inline">
                            <input type="text" id="art_editor" name="art_editor"  autocomplete="off" class="layui-input" value="{{$field->art_editor}}"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>缩略图:</label>
                        <div class="layui-input-inline">
                            <input type="text" id="art_thumb" name="art_thumb" size="50" class="layui-input" value="{{$field->art_thumb}}">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText': '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('admin/upload')}}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            //每个文件上传成功后会调用，可能会两次
                                            // alert('文件[' + file.name + ']上传成功了,' + response + '返回值:' + data);
                                            $('input[name=art_thumb]').val(data);
                                            $('#art_thumb_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red"></span></label>
                        <div class="layui-input-inline">
                            <img src="/{{$field->art_thumb}}" alt="" id="art_thumb_img" width="100%" height="100%">
                            <br>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label for="desc" class="layui-form-label">文章关键字:</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入内容" id="desc" name="art_keywords" class="" rows="3" cols="80">{{$field->art_keywords}}</textarea>
                        </div>
                    <div class="layui-form-item layui-form-text">
                        <label for="desc" class="layui-form-label">文章描述:</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入内容" id="desc" name="art_description" class="" rows="5" cols="100">{{$field->art_description}}</textarea>
                        </div>
                     <div class="layui-form-item layui-form-text">
                            <label for="desc" class="layui-form-label">文章内容:</label>
                            <div class="layui-input-block">
                                <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                                <script id="editor" name="art_content" type="text/plain" style="width:800px;height:500px;">{!! $field->art_content !!}</script>

                                <script type="text/javascript">
                                    //实例化编辑器
                                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                                    var ue = UE.getEditor('editor');
                                </script>
                            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" lay-filter="add" lay-submit="">修改</button></div>
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
                //         // 获得frame索引
                //         var index = parent.layer.getFrameIndex(window.name);
                //         //关闭当前frame
                //         parent.layer.close(index);
                //     });
                //     return false;
                // });

            });</script>
@endsection