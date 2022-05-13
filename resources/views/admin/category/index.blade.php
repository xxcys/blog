@extends('layouts.admin')
@section('content')
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="{{url('admin/index')}}">首页</a>
                 ><a href="{{url('admin/category')}}">分类管理</a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">
                           <a href="{{url('admin/category/create')}}" class="layui-btn layui-btn layui-btn-xs"><i class="iconfont">&#xe6b9;</i>添加分类</a>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th width="20">
                                    <input type="checkbox" name="" lay-skin="primary">
                                  </th>
                                  <th width="70">ID</th>
                                  <th>栏目名</th>
                                    <th>栏目内容</th>
                                  <th width="50">点击数</th>
                                  <th width="50">排序</th>
                                  <th width="250">操作</th>
                              </thead>
                                @foreach($data as $v)
                              <tbody class="x-cate">
                                <tr cate-id='1' fid='0' >
                                  <td>
                                    <input type="checkbox" name="" lay-skin="primary">
                                  </td>
                                  <td>{{$v->cate_id}}</td>
                                  <td>
                                    {{$v->_cate_name}}
                                      <br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                    <td>
                                        {{$v->cate_content}}
                                    </td>
                                  <td> {{$v->cate_view}}</td>
                                  <td>
                                      <input type="text" onchange="changeOrder" class="layui-input x-sort" name="changeOrder" value="{{$v->cate_order}}">
                                  </td>
                                  <td class="td-manage">
                                   <a href="{{url('admin/category/'.$v->cate_id.'/edit')}}"  class="layui-btn layui-btn layui-btn-xs"><i class="layui-icon">&#xe642;</i>编辑</a>
                                    <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del({{$v->cate_id}})" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
                                  </td>
                                </tr>
                              </tbody>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
          layui.use(['form'], function(){
            form = layui.form;

          });
           /*用户-删除*/
          function member_del(cate_id){
              layer.confirm('确认要删除吗？', {
                  bth:['确定','取消']
              },function(){
                  $.post("{{url('admin/category/')}}/"+cate_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                      if (data.status==0) {
                          location.href=location.href;
                          layer.msg(data.msg,{icon:6});
                      }else{
                          layer.msg(data.msg,{icon:5});
                      }
                  })
              });
          }

          // // 分类展开收起的分类的逻辑
          // //
          // $(function(){
          //   $("tbody.x-cate tr[fid!='0']").hide();
          //   // 栏目多级显示效果
          //   $('.x-show').click(function () {
          //       if($(this).attr('status')=='true'){
          //           $(this).html('&#xe625;');
          //           $(this).attr('status','false');
          //           cateId = $(this).parents('tr').attr('cate-id');
          //           $("tbody tr[fid="+cateId+"]").show();
          //      }else{
          //           cateIds = [];
          //           $(this).html('&#xe623;');
          //           $(this).attr('status','true');
          //           cateId = $(this).parents('tr').attr('cate-id');
          //           getCateId(cateId);
          //           for (var i in cateIds) {
          //               $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
          //           }
          //      }
          //   })
          // })
          //
          // var cateIds = [];
          // function getCateId(cateId) {
          //     $("tbody tr[fid="+cateId+"]").each(function(index, el) {
          //         id = $(el).attr('cate-id');
          //         cateIds.push(id);
          //         getCateId(id);
          //     });
          // }
   
        </script>
@endsection