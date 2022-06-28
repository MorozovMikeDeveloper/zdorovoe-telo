<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function index()
    {
        return view('admin.contents', [
            'contents' => Content::all()
        ]);
    }

    public function create()
    {
        return view('admin.contents-create');
    }

    public function edit(int $contentId)
    {
        return view('admin.contents-update', [
            'content' => Content::find($contentId)
        ]);
    }

    public function store(Request $request)
    {
        Content::create([
            'key'     => $request->key,
            'value'   => $request->value,
            'page_id' => $request->page_id,
        ]);

        return redirect('admin/contents');
    }

    public function update(Request $request, int $contentId)
    {
        Content::updateOrCreate(
            [
                'id'  => $contentId,
                'key' => $request->key
            ],
            [
                'key'     => $request->key,
                'value'   => $request->value,
                'page_id' => $request->page_id,
            ]
        );

        return redirect('admin/contents');
    }

    public function destroy(int $contentId)
    {
        Content::find($contentId)->delete();

        return redirect('admin/contents');
    }
}
