<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('page')->get();
        $pages = Page::all();
        return view('menus.index', compact('menus', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Page::all();
        return view('menus.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'nullable|exists:pages,id',
            'menu_title' => 'required|string|max:255',
            'menu_english' => 'required|string|max:255',
            'menu_french' => 'required|string|max:255',
            'menu_arabic' => 'required|string|max:255',
        ]);

        try {
            Menu::create([
                'page_id' => $request->page_id,
                'menu_title' => $request->menu_title,
                'menu_en' => $request->menu_english,
                'menu_fr' => $request->menu_french,
                'menu_ar' => $request->menu_arabic,
            ]);
            return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to create menu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $pages = Page::all();
        return view('menus.edit', compact('menu', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'page_id' => 'nullable|exists:pages,id',
            'menu_title' => 'required|string|max:255',
            'menu_english' => 'required|string|max:255',
            'menu_french' => 'required|string|max:255',
            'menu_arabic' => 'required|string|max:255',
        ]);

        $menu->update([
            'page_id' => $request->page_id,
            'menu_title' => $request->menu_title,
            'menu_en' => $request->menu_english,
            'menu_fr' => $request->menu_french,
            'menu_ar' => $request->menu_arabic,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully!');
    }
}
