@extends('layouts.admin')
@section('content')
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a href="">演示</a>
                <a>
                    <cite>导航元素</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()">
                                <i class="layui-icon"></i>批量删除</button>
                                <a href="{{url('admin/article/create')}}" class="layui-btn">
                                <i class="layui-icon"></i>添加</a></div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="" lay-skin="primary">
                                        </th>
                                        <th>文章标题</th>
                                        <th>文章描述</th>
                                        <th>发布时间</th>
                                        <th>发布人</th>
                                        <th>点击数</th>
                                        <th>操作</th></tr>
                                </thead>
                                @foreach($data as $v)
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="" lay-skin="primary"></td>
                                        <td>{{$v->art_title}}</td>
                                        <td>{{$v->art_description}}</td>
                                        <td>{{date('Y-m-d',$v->art_time)}}</td>
                                        <td>{{$v->art_editor}}</td>
                                        <td>{{$v->art_view}}</td>
                                        <td class="td-manage">
                                            <a title="查看" href="{{url('admin/article/'.$v->art_id.'/edit')}}">
                                                <i class="layui-icon">&#xe63c;</i></a>
                                            <a title="删除" onclick="member_del({{$v->art_id}})" href="javascript:;">
                                                <i class="layui-icon">&#xe640;</i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                  {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>layui.use(['laydate', 'form'],
        function() {
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });

        /*用户-删除*/
        function member_del(art_id){
            layer.confirm('确认要删除吗？', {
                bth:['确定','取消']
            },function(){
                $.post("{{url('admin/article/')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                    if (data.status==0) {
                        location.href=location.href;
                        layer.msg(data.msg,{icon:6});
                    }else{
                        layer.msg(data.msg,{icon:5});
                    }
                })
            });
        }

        // function delAll(argument) {
        //
        //     var data = tableCheck.getData();
        //
        //     layer.confirm('确认要删除吗？' + data,
        //     function(index) {
        //         //捉到所有被选中的，发异步进行删除
        //         layer.msg('删除成功', {
        //             icon: 1
        //         });
        //         $(".layui-form-checked").not('.header').parents('tr').remove();
        //     });
        // }
    </script>

@endsection