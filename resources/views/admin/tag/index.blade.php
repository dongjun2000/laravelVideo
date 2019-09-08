@extends('admin.layouts.main')

@section('title', '标签管理')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true">标签列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false">添加标签</a>
        </li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            {{--标签列表--}}
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>标签名</th>
                    <th width="100px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td scope="row">{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('admin.tag.edit', $tag) }}">修改</a>
                                <form action="{{ route('admin.tag.destroy', $tag) }}" method="post" onsubmit="return confirm('确认要删除吗？')">
                                    @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            {{--添加标签--}}
            <form action="{{ route('admin.tag.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">标签名：</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-primary">添加</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop