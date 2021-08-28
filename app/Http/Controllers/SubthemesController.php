<?php

namespace App\Http\Controllers;
use App\Theme;

use Illuminate\Http\Request;

class SubthemesController extends Controller
{
    public function index($theme)
    {
        define('theme', $theme);
        $subthemes = Theme::firstWhere('url', $theme)->subthemes;
        define('subthemes', $subthemes);
        return view('subthemes', compact('theme'), compact('subthemes'));
    }

    public function add(Request $req){
        Theme::find($req->input('theme'))->subthemes()
        ->create([
            'name' => $req->input('name'),
            'url' => $req->input('url'),
        ]);
        return redirect(route('themes'));
    }
}
