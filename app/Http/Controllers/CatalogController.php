<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('catalog', [
            'courses' => Course::all(),
            'user' => $user
        ]);
    }
}
