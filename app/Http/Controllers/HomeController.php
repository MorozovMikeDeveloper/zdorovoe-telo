<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Page;

class HomeController extends Controller
{
    function index()
    {
        return view('home', [
            'courses' => Course::all(),
            'user' => $user ?? null,
            'content' => $this->getPageContent()->value
        ]);
    }

    function getPageContent()
    {
        $url = url()->current();
        $url = str_replace($url, '/', $url);
        $pageId = Page::where('slug', $url)->get()[0]->id;
        return Content::where('page_id', $pageId)->get()[0];
    }
}
