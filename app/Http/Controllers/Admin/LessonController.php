<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LessonStoreRequest;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LessonController extends Controller
{
    /**
     * 显示课程列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::orderBy('id', 'DESC')->paginate(10);
        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 添加课程
     *
     * @param Request $request
     * @return $this
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LessonStoreRequest $request)
    {
        $lesson = $this->storeLesson($request);
        $this->storeVideo($request, $lesson);

        return redirect()->route('admin.lesson.index')->with('success', '课程添加成功！');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

    /**
     * 图片上传
     *
     * @param Request $request
     * @return string
     */
    private function upload(Request $request)
    {
        $path = '';
        $uploadFileName = 'preview';
        if ($request->hasFile($uploadFileName) && $request->file($uploadFileName)->isValid()) {
            $path = $request->file($uploadFileName)->store(date('ym'), 'public');
        }
        return !$path ? $path : asset('storage/' . $path);
    }

    /**
     * 添加课程
     *
     * @param Request $request
     * @return mixed
     */
    private function storeLesson(Request $request)
    {
        $lessonData = $request->only('title', 'intro', 'iscommend', 'ishot', 'click');
        $lessonData['preview'] = $this->upload($request);
        return Lesson::create($lessonData);
    }

    /**
     * 添加视频
     *
     * @param Request $request
     */
    public function storeVideo(Request $request, Lesson $lesson)
    {
        // 添加课程对应的视频
        $videos = json_decode($request->get('videos'), true);
        foreach ($videos as $video) {
            $lesson->videos()->create($video);
        }
    }
}
