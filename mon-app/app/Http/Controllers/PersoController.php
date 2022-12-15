<?php

namespace App\Http\Controllers;

use App\Models\personnage;
use Illuminate\Http\Request;



class PersoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'specialite' => 'required',

        ]);

        $personnage = personnage::create([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'specialite' => $request->input('specialite'),

        ]);
        $pageAccueil = route('store');
        return redirect($pageAccueil)->with('message', 'Créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = personnage::findOrFail($id);
        return view('blogs.show', [ 'article' => $article ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = personnage::findOrFail($id);
        return view('blogs.edit', [ 'article' => $article ]);
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
        // récupérer l'objet Blog correspondant à l'ID
        $article = personnage::findOrFail($id);

        // validation du formulaire
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'followers' => 'required|integer',
        ]);

        // Mise à jour de l'objet
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author = $request->input('author');
        $article->followers = $request->input('followers');

        // Enregistrement
        $article->save();

        // redirection page ...
        $pageAccueil = route('blog.index');
        return redirect($pageAccueil)->with('message', 'Mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $article = personnage::findOrFail($id);
            $article->delete();
            return redirect(route('blog.index'))->with('message', 'Supprimé avec succès');
        } catch(\Exception $error) {
            return response($error, 404);
        }
    }

    public function factory() {
        $users = personnage::factory()->count(3)->create();
    }
}
