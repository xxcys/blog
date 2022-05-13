@extends('layouts.admin')
@section('content')

        <div class="layui-fluid">
            <div class="layui-row">

                <form class="layui-form" action="">
                    {{csrf_field()}}
                        @if(count($errors)>0)
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            @else
                            {{$errors}}
                            @endif
                    @endif
            <div class="layui-form-item">
                <label  class="layui-form-label">
                    <span class="x-red"></span>原密码</label>
                <div class="layui-input-inline">
                    <input type="password" id="password" name="password_o" autocomplete="off" class="layui-input" ></div>
            </div>

            <div class="layui-form-item">
                <label  class="layui-form-label">
                    <span class="x-red"></span>新密码</label>
                <div class="layui-input-inline">
                    <input type="password" id="new_pwd" name="password" autocomplete="off" class="layui-input"></div>
            </div>

            <div class="layui-form-item">
                <label  class="layui-form-label"></label>
                <button class="layui-btn" lay-filter="create" lay-submit="create">修改</button></div>
        </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            // function() {
            //     $ = layui.jquery;
            //     var form = layui.form,
            //     layer = layui.layer;

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
