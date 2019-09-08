<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagStoreRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * 添加标签
     *
     * @param TagStoreRequest $request
     * @return $this
     */
    public function store(TagStoreRequest $request)
    {
        Tag::create($request->all());

        return back()->with('success', '添加成功!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * 删除标签
     *
     * @param Tag $tag
     * @return $this
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('success', '删除成功！');
    }
}
