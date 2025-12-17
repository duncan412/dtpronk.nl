<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(string $slug): View
    {
        $page = Page::whereJsonContainsLocale('slug', 'nl', $slug)
            ->firstOrFail();

        return view('pages.index', compact('page'));
    }

    public function localeAware(string $locale, string $slug): View
    {
        $page = Page::whereJsonContainsLocale('slug', $locale, $slug)
            ->firstOrFail();

        return view('pages.index', compact('page'));
    }
}
