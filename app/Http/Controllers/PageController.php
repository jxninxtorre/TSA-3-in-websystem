<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('about', [
            'course' => 'Web System Technologies',
            'module' => 'Laravel Foundations',
        ]);
    }

    public function task($id)
    {
        return view('task', [
            'id' => $id,
            'title' => 'Buy groceries',
        ]);
    }
}