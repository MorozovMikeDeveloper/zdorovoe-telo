<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CatalogController extends Controller
{
    public function index()
    {
        return view('cabinet', [
            'courses' => Course::all(),
        ]);
    }
}
