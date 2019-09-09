@extends('admin.layouts.main')

@section('title', '编辑标签')

@section('content')
    <form action="{{ route('admin.tag.update', $tag) }}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                编辑标签
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">标签名：</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary">添加</button>
            </div>
        </div>
    </form>
@stop