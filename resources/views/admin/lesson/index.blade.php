@extends('admin.layouts.main')

@section('title', '课程管理')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true">课程列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false">添加课程</a>
        </li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            {{--课程列表--}}
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>课程名</th>
                            <th width="100px">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td scope="row">{{ $lesson->id }}</td>
                                <td>{{ $lesson->title }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="{{ route('admin.lesson.edit', $lesson) }}">修改</a>
                                        <form action="{{ route('admin.lesson.destroy', $lesson) }}" method="post"
                                              onsubmit="return confirm('确认要删除吗？')">
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
                <div class="card-footer text-muted">
                    {{ $lessons->links() }}
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            {{--添加课程--}}
            <form action="{{ route('admin.lesson.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                课程管理
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">课程名：</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="intro">课程介绍：</label>
                                    <textarea class="form-control" name="intro" id="intro" rows="3"
                                              style="resize:none">{{ old('intro') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="preview">预览图：</label>
                                    <input type="file" name="preview">
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">是否推荐：</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="iscommend" id="iscommend"
                                                       value="1">
                                                <label class="form-check-label" for="iscommend">
                                                    是
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input checked class="form-check-input" type="radio" name="iscommend"
                                                       id="iscommend" value="0">
                                                <label class="form-check-label" for="iscommend">
                                                    否
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">是否热门：</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ishot" id="ishot" value="1">
                                                <label class="form-check-label" for="ishot">
                                                    是
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input checked class="form-check-input" type="radio" name="ishot" id="ishot"
                                                       value="0">
                                                <label class="form-check-label" for="ishot">
                                                    否
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <label for="click">点击数：</label>
                                    <input type="text" class="form-control" name="click" id="click" value="{{ old('click', 0) }}">
                                </div>
                            </div>

                            <textarea style="display: none" name="videos" id="" cols="30" rows="10">@{{ videos }}</textarea>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                视频管理
                            </div>
                            <div class="card-body">
                                <div class="card mb-3" v-for="(v, k) in videos">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">视频标题：</label>
                                            <input type="text" class="form-control" id="title"
                                                   v-model="v.title">
                                        </div>
                                        <div class="form-group">
                                            <label for="path">视频地址：</label>
                                            <input type="text" class="form-control" id="path"
                                                   v-model="v.path">
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <button class="btn btn-danger btn-sm" @click.prevent="del(k)">删除视频
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-sm" @click.prevent="add">添加视频</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-primary">完成</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@stop

@section('script')
    <script>
        new Vue({
            el: '#app',
            data: {
                videos: [
                    
                ]
            },
            methods: {
                add: function() {
                    this.videos.push({title: '', path: ''});
                },
                del: function(k) {
                    this.videos.splice(k, 1);
                }
            }
        });
    </script>
@stop