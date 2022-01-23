<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\ContentBox;
use App\Http\Requests\StoreContentBoxRequest;
use App\Http\Requests\UpdateContentBoxRequest;
use Illuminate\Support\Facades\Storage;

class ContentBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $contentbox = ContentBox::all();
        return view('admin.contentbox.index', compact('contentbox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreContentBoxRequest $request)
    {
        $data=$request->all();
        $contentbox = ContentBox::create($data);
//        dd($contentbox);
        for ($i =0; $i < count($data['attachment']); $i++)
        {
            $attachment_data = $data['attachment'][$i]->store($contentbox->id, 'public');
            $file_data['contentbox_id'] = $contentbox->id;
            $file_data['file_name'] = pathinfo($attachment_data)['basename'];
            $extension = pathinfo( $file_data['file_name'], PATHINFO_EXTENSION);
            $attachment = Attachment::create($file_data);
        }
        return redirect()->route('contentbox.index')->with('success', true);
    }

    function downloadFile($file_name){
        $file = Storage::disk('public')->get($file_name);

        return (new Response($file, 200));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(ContentBox $contentbox)
    {
        return view('admin.contentbox.show', compact('contentbox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(ContentBox $contentbox)
    {
        return view('admin.contentbox.edit', compact('contentbox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentBoxRequest  $request
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateContentBoxRequest $request, ContentBox $contentbox)
    {
        $data=$request->all();
        $contentbox->update($data);

        return redirect()->route('contentbox.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ContentBox $contentbox)
    {
        $directory = $contentbox->id;
        Storage::deleteDirectory('public/'.$directory);
        $contentbox->delete();
        return redirect()->route('contentbox.index')->with('success', true);
    }
}
