<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all()->toArray();
        return array_reverse($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        try{   
            $categorie = new Categorie([
            'nomcategorie' => $request->input('nomcategorie'),
            'imagecategorie' => $request->input('imagecategorie'),
            ]);
            $categorie->save();
            return response()->json($categorie);}
            catch (\Exception $e){return response()->json("problem ajout");}
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   try{
        $categorie = Categorie::findOrFail($id);
        return response()->json($categorie);}
        catch (\Exception $e){return response()->json("problem ");}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   try {
        $categorie = Categorie::findOrFail($id);
        $categorie->update($request->all());
        return response()->json('Catégorie MAJ !');}
        catch (\Exception $e){return response()->json("problem {$e->getMessage()},{$e->getCode()}");}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   try {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return response()->json('ok');}
        catch (\Exception $e){return response()->json("problem ");}
    }
}
