<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request;
use App\Models\Posty;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posty = Posty::all();
        return view('posty.index', compact('posty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(PostStoreRequest $request)
    {
       // dump($request);
       // dd($request);
       //$request->dump();

       /* $request->validate([
        'tytul' => 'required|min:3|max:150',
        'autor' => 'required|min:2',
        'email' => 'required|email:rfc,dns',
        'tresc' => 'required|min:5'
       ],
       [
        'required' => "Pole jest wymagane",
            'min' => "Minimalna liczba znaków to :min",
            'max' => "Maksymalna liczba znaków to :max",
            'email' => "Podaj prawidłowego maila"
       ]
    ); */
        $posty = new Posty();
        $posty->tytul = request('tytul');
        $posty->autor = request('autor');
        $posty->email = request('email');
        $posty->tresc = request('tresc');
        $posty->save();
       return redirect()->route('posty.index')->with('message',"Post został poprawnie dodany");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        //echo "Show: $id";
        $post = Posty::findOrFail($id);
        return view('posty.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
