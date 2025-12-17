<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function index(string $slug)
    {
        app()->setLocale('nl');

        $page = Page::whereJsonContainsLocale('slug', app()->getLocale(), $slug)
            ->firstOrFail();

        return view('pages.index', compact('page'));
    }
}
