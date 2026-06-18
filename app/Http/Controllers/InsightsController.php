<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\News;
use App\Models\Publication;

class InsightsController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->limit(6)->get();
        $news = News::orderByDesc('created_at')->limit(6)->get();
        $publications = Publication::orderByDesc('created_at')->limit(6)->get();

        return view('insights', compact('projects','news','publications'));
    }
}