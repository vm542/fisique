<?php

namespace App\Http\Controllers;
use App\Theme;

use Illuminate\Http\Request;

class ThemesController extends Controller
{

    public function index()
    {
        $themes = Theme::all();
        return view('themes', compact('themes'));
    }

    public function add(Request $req){
        Theme::create([
            'name' => $req->input('name'),
            'url' => $req->input('url'),
        ]);
        return redirect(route('themes'));
    }
}
