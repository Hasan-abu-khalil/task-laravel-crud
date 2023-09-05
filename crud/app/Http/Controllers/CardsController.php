<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Cards::all();
        return view('cards.index', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Cards::create($request->all());
        return redirect()->route('cards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $card = Cards::findOrFail($id);
        return view('cards.show', ['card' => $card]);

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $card = Cards::findOrFail($id);
        return view('cards.edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $card = Cards::findOrFail($id);
        $card->update($request->all());
        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $card = Cards::findOrFail($id);
        $card->delete();
        return redirect()->route('cards.index');
    }
}





// namespace App\Http\Controllers;

// use App\Models\Cards;
// use Illuminate\Http\Request;

// class CardsController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {

//         $Cards = Cards::all();

//         return view('cards.index', ['Cards' => $Cards]);
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('cards.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'description' => 'required',
//             'price' => 'required',
//         ]);

//         Cards::create($request->all());
//         return redirect()->route('cards.index');

//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Cards $cards)
//     {
        
//         return view('cards.show', ['cards' => $cards]);
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Cards $cards)
//     {
//         return view('cards.edit', ['cards' => $cards]);
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Cards $cards)
//     {
        
//         $request->validate([
//             'name' =>'required',
//             'description' =>'required',
//             'price' =>'required',
//         ]);
//         $cards->update($request->all());
//         return redirect()->route('cards.index');

//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Cards $cards)
//     {
//         $cards->delete();
//         return redirect()->route('cards.index');

//     }
// }


