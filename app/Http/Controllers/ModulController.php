<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class ModulController extends Controller
{
    public function index()
    {
        $news = News::orderByDESC('created_at')->where('is_published', 1)->get();
        return view('index', compact('news'));
    }
}
