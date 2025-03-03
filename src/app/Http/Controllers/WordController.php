<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Http\Requests\WordRequest;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $words = Word::search($search)->latest()->get();

        return view('index', compact('words', 'search'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(WordRequest $request)
    {
        $word = $request->only(['keyword', 'description']);
        Word::create($word);

        return redirect('/create')->with('message', '登録しました');
    }
}
