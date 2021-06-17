<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        $data = [
            'comics' => $comics
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( $this->getValidationRules() );

        $form_data = $request->all();
        // dd($form_data);
        $comic = new Comic();
        // $comic->name = $form_data['name'];
        // $comic->description = $form_data['description'];
        // $comic->author = $form_data['author'];
        // $comic->image = $form_data['image'];
        // $comic->price = $form_data['price'];
        $comic->fill($form_data);
        $comic->save();

        return redirect()-> route('comics.show', [
            'comic' => $comic->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    //public function show(Comic $comic)
    {
        $comic = Comic::findOrFail($id);
        //dd($comic);

        $data = [
            'comic' => $comic
        ];

        return view( 'comics.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        //dd($comic);

        $data = [
            'comic' => $comic
        ];

        return view( 'comics.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate( $this->getValidationRules() );

        $form_data = $request->all();
        
        $comic_to_modify = Comic::find($id);
        $comic_to_modify->update($form_data);
        
        //dd('Aggiornamento effettuato');
        return redirect()->route('comics.show', ['comic'=>$comic_to_modify->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic_to_delete = Comic::find($id);
        
        $comic_to_delete->delete();
        return redirect()->route('comics.index');
    }

    private function getValidationRules () {
        $validation_rules = [
            'name' => 'required|min:3|max:255',
            'image' =>'required|max:255',
            'author' => 'required|min:3|max:100',
            'price' => 'required|min:1|max:9'
        ];

        return $validation_rules;
    }
}
