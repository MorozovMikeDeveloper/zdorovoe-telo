<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CatalogController extends Controller
{
    public function store()
    {
        return Course::all();
    }
}
