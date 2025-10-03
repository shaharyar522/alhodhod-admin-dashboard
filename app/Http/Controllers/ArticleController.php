<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('menu')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('articles.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language' => 'required|string|in:en,fr,ar',
            'article_title' => 'required|string|max:255',
            'article_slug' => 'nullable|string|max:255|unique:articles,article_slug',
            'article_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
            'menu_id' => 'nullable|exists:menus,id',
        ]);

        try {
            // Slug unique banane ka logic
            $article_slug = $request->filled('article_slug')
                ? Str::slug($request->article_slug, "-")
                : Str::slug($request->article_title, "-");

            if (Article::where('article_slug', $article_slug)->exists()) {
                $article_slug .= '-' . time();
            }

            // Image upload
            $article_image_path = null;
            if ($request->hasFile('article_image')) {
                $image = $request->file('article_image');
                $name = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/articles'), $name);
                $article_image_path = 'uploads/articles/' . $name;
            }

            // Save
            Article::create([
                'lang' => $request->language,
                'article_title' => $request->article_title,
                'article_slug' => $article_slug,
                'article_image' => $article_image_path,
                'content' => $request->content,
                'show_on_home_page' => $request->has('show_on_home_page') ? 1 : 0,
                'menu_id' => $request->menu_id,
            ]);

            return redirect()->route('articles.index')->with('success', 'Article created successfully!');
        } catch (\Throwable $th) {
            Log::error("Article Store Error: ".$th->getMessage());
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id)
    {
        $article = Article::with('menu')->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $menus = Menu::all();
        return view('articles.edit', compact('article', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'language' => 'required|string|in:en,fr,ar',
            'article_title' => 'required|string|max:255',
            'article_slug' => 'nullable|string|max:255|unique:articles,article_slug,' . $id,
            'article_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
            'menu_id' => 'nullable|exists:menus,id',
        ]);

        try {
            $article = Article::findOrFail($id);

            $article_slug = $request->filled('article_slug')
                ? Str::slug($request->article_slug, "-")
                : Str::slug($request->article_title, "-");

            if (Article::where('article_slug', $article_slug)->where('id', '!=', $id)->exists()) {
                $article_slug .= '-' . time();
            }

            $article_image_path = $article->article_image;
            if ($request->hasFile('article_image')) {
                if ($article->article_image && file_exists(public_path($article->article_image))) {
                    unlink(public_path($article->article_image));
                }
                $image = $request->file('article_image');
                $name = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/articles'), $name);
                $article_image_path = 'uploads/articles/' . $name;
            }

            $article->update([
                'lang' => $request->language,
                'article_title' => $request->article_title,
                'article_slug' => $article_slug,
                'article_image' => $article_image_path,
                'content' => $request->content,
                'show_on_home_page' => $request->has('show_on_home_page') ? 1 : 0,
                'menu_id' => $request->menu_id,
            ]);

            return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
        } catch (\Throwable $th) {
            Log::error("Article Update Error: ".$th->getMessage());
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);

            if ($article->article_image && file_exists(public_path($article->article_image))) {
                unlink(public_path($article->article_image));
            }

            $article->delete();

            return redirect()->route('articles.index')->with('delete_success', 'Article deleted successfully!');
        } catch (\Throwable $th) {
            Log::error("Article Delete Error: ".$th->getMessage());
            return redirect()->route('articles.index')->with('error', $th->getMessage());
        }
    }
}
