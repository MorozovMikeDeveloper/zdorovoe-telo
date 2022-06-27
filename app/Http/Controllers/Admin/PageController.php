<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages', [
            'pages' => Page::all(),
        ]);
    }

    public function create()
    {
        return view('admin.pages-create');
    }

    public function edit(int $pageId)
    {
        return view('admin.pages-update', [
            'page' => Page::find($pageId),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Page::create(['name' => $request->name]);

        return redirect('admin/pages');
    }

    public function update(Request $request, int $pageId)
    {
        Page::updateOrCreate(
            [
                'id' => $pageId
            ],
            [
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect('admin/pages');
    }

    public function destroy(int $pageId)
    {
        Page::find($pageId)->delete();
        return redirect('admin/pages');
    }
}
