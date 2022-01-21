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
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContentBoxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentBoxRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function show(ContentBox $contentBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentBox $contentBox)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentBox $contentBox)
    {
        //
    }
}
