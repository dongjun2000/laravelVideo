@extends('admin.layouts.main')

@section('title', '个人信息')

@section('content')
    <form action="{{ route('admin.me') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                个人信息
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">账号：</label>
                    <input disabled type="text" class="form-control" name="username" id="username"
                           value="{{ Auth::guard('admin')->user()->username }}">
                </div>
                <div class="form-group">
                    <label for="nickname">昵称：</label>
                    <input type="text" class="form-control" name="nickname" id="nickname"
                           value="{{ Auth::guard('admin')->user()->nickname }}">
                </div>
                <div class="form-group">
                    <label for="password">旧密码：</label>
                    <input type="password" class="form-control" name="old_password" id="password">
                </div>
                <div class="form-group">
                    <label for="password">新密码：</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">确认密码：</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">修改</button>
            </div>
        </div>
    </form>
@stop