<?php

namespace App\Http\Controllers;
use App\SubTheme;
use App\Problem;

use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index($theme, $subtheme, $id){
        $problem = Problem::find($id);

        if (auth()->user()->problems()->where('id', $id)->count() >= 1){
            if (auth()->user()->problems()->where('id', $id)->first()->pivot->solved == "1"){
                return view('problem', compact('problem', 'subtheme', 'theme', 'id'))->with('successMsg','solved');
            }
            else{
                return view('problem', compact('problem', 'subtheme', 'theme', 'id'))->with('errorMsg','solved');
            }
        }
        return view('problem', compact('problem', 'subtheme', 'theme', 'id'));
    }

    public function add(Request $req){
        SubTheme::find($req->input('theme'))->problems()
        ->create([
            'description' => $req->input('description'),
            'solution' => $req->input('solution'),
            'explanation' => $req->input('explanation'),
            'format' => $req->input('format'),
            'creator' => auth()->user()->id,
        ]);
        return redirect(route('themes'));
    }

    public function check($theme, $subtheme, $id, Request $req){
        auth()->user()->problems()->detach($id);
        if (Problem::find($id)->solution == $req->input('solution')){
            auth()->user()->problems()->attach($id, ['solved' => true]);
            return redirect()->back()->withSuccess('IT WORKS!');
        }
        auth()->user()->problems()->attach($id, ['solved' => false]);
        return redirect()->back()->withError('IT WORKS!');
    }
}
