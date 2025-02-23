<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest; // Make sure to import the CommentRequest if you're using it

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Display all comments if needed
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form for creating a comment if needed
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        // Create a new comment
        // Comment::create([
        //     'annonce_id' => $request->annonce_id,
        //     'content' => $request->content,
        // ]);

        // // Redirect back with a success message
        // return back()->with('success', 'Comment added successfully!');

         // Create a new comment
    Comment::create([
        'content' => $request->input('content'),
        'user_id' => auth()->user()->id, // Ensure the user is authenticated
        'annonce_id' => $request->input('annonce_id'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect or return a response
    return redirect()->route('annonces.index')->with('success', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Show the comment details if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Show the form to edit the comment if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update the comment if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // Delete the comment
        $comment->delete();

        // Redirect to the comments index with a success message
        return redirect()->route('annonces.index')->with('success', 'Comment deleted successfully');
    }
}
