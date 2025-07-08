<?php

namespace App\Http\Controllers;

use App\Models\ArticleImage;
use Illuminate\Http\Request;

class ArticleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articleImages = ArticleImage::get();
        return view('articles_Images.index',compact('articleImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles_Images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $request->validate([
            'article_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        try {
              $article_image = null;
            if ($request->hasFile('article_image')) {
                $article_image = $request->file('article_image');
                $article_image_OriginalName = time() . '_' . $article_image->getClientOriginalName();
                $article_image->move(public_path('artilceimages/article_image'), $article_image_OriginalName);

                $article_image_path = 'artilceimages/article_image/' .  $article_image_OriginalName;
            }

            // ab main store karo ga data ko database main 
            
            ArticleImage::create([
                'Image_path' => $article_image_path,
            ]);
            return redirect()->route('articleimage.index')->with('success', 'Article Image created successfully!');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleImage $articleImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleImage $articleImage)
    {
        //
    }
}
