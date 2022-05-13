@extends('layouts.admin')
@section('content')
    <body>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <blockquote class="layui-elem-quote">欢迎管理员：
                                <span class="x-red">test</span>！当前时间:  <?php echo date('Y年m月d日 H时i分s秒');?>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">系统信息</div>
                        <div class="layui-card-body ">
                            <table class="layui-table">
                                <tbody>
                                    <tr>
                                        <th>PHP版本</th>
                                        <td>7.2.18</td></tr>
                                    <tr>
                                        <th>服务器地址</th>
                                        <td>{{$_SERVER['SERVER_NAME']}}</td></tr>
                                    <tr>
                                        <th>运行环境</th>
                                        <td>{{$_SERVER['SERVER_SOFTWARE']}}</td></tr>
                                    <tr>
                                        <th>{{$_SERVER['APP_NAME']}}</th>
                                        <td>5.6</td></tr>
                                    <tr>
                                        <th>上传附件限制</th>
                                        <td><?php echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传附件"; ?></td></tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">开发团队</div>
                        <div class="layui-card-body ">
                            <table class="layui-table">
                                <tbody>
                                    <tr>
                                        <th>版权所有</th>
                                        <td>xxcys.xyz

                                    </tr>
                                    <tr>
                                        <th>开发者</th>
                                        <td>星溪辰夜</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <style id="welcome_style"></style>
                <div class="layui-col-md12">
                    <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由x-admin提供技术支持。</blockquote></div>
            </div>
        </div>
        </div>
    @endsection