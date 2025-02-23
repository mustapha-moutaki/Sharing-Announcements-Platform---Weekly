<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Annonce;
use App\Models\Comment;
use App\Http\Requests\AnnonceRequest;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $annonces = Annonce::paginate(10);
        // $comments = Comment::all(); 
        $annonces = Annonce::with('comments')->paginate(10);
        $categories = Category::all(); 
        
        return view ('annonces.index', compact('annonces', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();  
        return view('annonces.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnonceRequest $request)
    {
        $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }   
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'create a acoount to creaate a post.');
    }

        Annonce::create([
            'title' => $request->title,
            'description' => $request->description,
            'prix' => $request->price,
            'image' => $imagePath,
            'userId' => auth()->id(),
            'categoryId' => $request->category_id,
        ]);
    
        return redirect()->route('annonces.index')->with('success', 'annonce created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        $categories = Category::all();
        return view('annonces.edit', compact('annonce', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
{   
    
    if ($request->hasFile('image')) {
        if ($annonce->image) {
            Storage::disk('public')->delete($annonce->image); // ✅ التصحيح هنا
        }

        
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = $annonce->image;
    }

    
    $annonce->update([
        'title' => $request->title,
        'description' => $request->description,
        'prix' => $request->price,
        'image' => $imagePath,
        'userId' => auth()->id(),
        'categoryId' => $request->category_id,
    ]);

    return redirect()->route('annonces.index')->with('success', 'Annonce updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();
        return redirect()->route('annonces.index')->with('success', 'annonce deleted successfully!');
    }
}
