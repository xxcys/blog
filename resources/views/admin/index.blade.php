@extends('layouts.admin')
@section('content')
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo">
            <a href="./index.html">xxcy博客后台</a></div>
        <div class="left_open">
            <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
        </div>
        <ul class="layui-nav right" lay-filter="">
            <li class="layui-nav-item">
                <a href="javascript:;">admin</a>
                <dl class="layui-nav-child">
                    <!-- 二级菜单 -->
                    <dd>
                        <a onclick="xadmin.open('个人信息','http://www.baidu.com')">个人信息</a></dd>
                    <dd>
                        <a href="{{url('admin/quit')}}">退出</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item to-index">
                <a onclick="xadmin.add_tab('修改密码','{{url('admin/pass')}}')">
                    <cite>修改密码</cite></a></li>
            <li class="layui-nav-item to-index">
                <a href="/">前台首页</a></li>
        </ul>
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li>
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="会员管理">&#xe6b8;</i>
                        <cite>会员管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('会员列表(动态表格)','member-list1.html',true)">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>会员列表</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('会员删除','member-del.html')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>会员删除</cite></a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="iconfont">&#xe70b;</i>
                                <cite>会员管理</cite>
                                <i class="iconfont nav_right">&#xe697;</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a onclick="xadmin.add_tab('会员删除','member-del.html')">
                                        <i class="iconfont">&#xe6a7;</i>
                                        <cite>会员删除</cite></a>
                                </li>
                                <li>
                                    <a onclick="xadmin.add_tab('等级管理','member-list1.html')">
                                        <i class="iconfont">&#xe6a7;</i>
                                        <cite>等级管理</cite></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="分类管理">&#xe699;</i>
                        <cite>分类管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('多级分类','{{url('admin/category')}}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>多级分类</cite></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="文章管理">&#xe74e;</i>
                        <cite>文章管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('文章列表','{{url('admin/article')}}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>文章列表</cite></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="友情链接管理">&#xe6f7;</i>
                        <cite>友情链接管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('链接列表','{{url('admin/link')}}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>链接列表</cite></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
            <ul class="layui-tab-title">
                <li class="home">
                    <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
            <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                <dl>
                    <dd data-type="this">关闭当前</dd>
                    <dd data-type="other">关闭其它</dd>
                    <dd data-type="all">关闭全部</dd></dl>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe src='{{url('admin/welcome')}}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                </div>
            </div>
            <div id="tab_show"></div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <style id="theme_style"></style>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <script>//百度统计可去掉
        var _hmt = _hmt || []; (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();</script>

@endsection
