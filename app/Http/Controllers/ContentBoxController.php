<?php

namespace App\Http\Controllers;

use App\Models\ContentBox;
use App\Http\Requests\StoreContentBoxRequest;
use App\Http\Requests\UpdateContentBoxRequest;

class ContentBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contentbox = ContentBox::all();
        return view('admin.contentbox.index', compact('contentbox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contentbox = new ContentBox();
        return view('admin.contentbox.create', compact('contentbox'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContentBoxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentBoxRequest $request)
    {
        ContentBox::create($request->all());
        return redirect()->route('contentbox.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function show(ContentBox $contentBox)
    {
        return view('admin.contentbox.show', compact('contentBox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentBox $contentBox)
    {
        return view('admin.contentbox.edit', compact('contentBox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentBoxRequest  $request
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentBoxRequest $request, ContentBox $contentBox)
    {
        $contentBox->update($request->all());
        return redirect()->route('contentbox.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentBox $contentBox)
    {
        $contentBox->delete();
        return redirect()->route('contentbox.index')->with('success', true);
    }
}
