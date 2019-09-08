<!doctype html>
<html lang="zh-CN">
<head>
    <title>登录 - {{ config('app.name') }}后台管理系统</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
</nav>

<div class="col-md-4 offset-md-4 mt-5">
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header text-center">用户登录</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">账号：</label>
                    <input type="text"
                           class="form-control" name="username" id="username" name="{{old('username')}}">
                </div>
                <div class="form-group">
                    <label for="password">密码：</label>
                    <input type="password"
                           class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary btn-block">登录</button>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>