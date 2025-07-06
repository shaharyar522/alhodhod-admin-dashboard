<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $menus = Menu::with('page')->get();
            $pages = Page::all();
            return view('menus.index', compact('menus', 'pages'));
        } catch (\Exception $e) {
            Log::error('Menu index error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load menus');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $pages = Page::all();
            return view('menus.create', compact('pages'));
        } catch (\Exception $e) {
            Log::error('Menu create error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load create form');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'page_id' => 'nullable|exists:pages,id',
            'menu_title' => 'required|string|max:255',
            'menu_en' => 'required|string|max:255',
            'menu_fr' => 'required|string|max:255',
            'menu_ar' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();
            
            $menu = Menu::create([
                'page_id' => $request->page_id,
                'menu_title' => $request->menu_title,
                'menu_en' => $request->menu_en,
                'menu_fr' => $request->menu_fr,
                'menu_ar' => $request->menu_ar,
            ]);

            DB::commit();
            
            Log::info('Menu created successfully', ['menu_id' => $menu->id, 'title' => $menu->menu_title]);
            return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Menu creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'validation_errors' => $request->validator->errors() ?? 'No validation errors'
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create menu. Please try again.');
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
        try {
            $pages = Page::all();
            return view('menus.edit', compact('menu', 'pages'));
        } catch (\Exception $e) {
            Log::error('Menu edit error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load edit form');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        // Validate the request
        $validated = $request->validate([
            'page_id' => 'nullable|exists:pages,id',
            'menu_title' => 'required|string|max:255',
            'menu_en' => 'required|string|max:255',
            'menu_fr' => 'required|string|max:255',
            'menu_ar' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();
            
            $menu->update([
                'page_id' => $request->page_id,
                'menu_title' => $request->menu_title,
                'menu_en' => $request->menu_en,
                'menu_fr' => $request->menu_fr,
                'menu_ar' => $request->menu_ar,
            ]);

            DB::commit();
            
            Log::info('Menu updated successfully', ['menu_id' => $menu->id, 'title' => $menu->menu_title]);
            return redirect()->route('menus.index')->with('success', 'Menu updated successfully!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Menu update failed: ' . $e->getMessage(), [
                'menu_id' => $menu->id,
                'request_data' => $request->all(),
                'validation_errors' => $request->validator->errors() ?? 'No validation errors'
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update menu. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {
            DB::beginTransaction();
            
            $menuTitle = $menu->menu_title;
            $menu->delete();
            
            DB::commit();
            
            Log::info('Menu deleted successfully', ['menu_title' => $menuTitle]);
            return redirect()->route('menus.index')->with('success', 'Menu deleted successfully!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Menu deletion failed: ' . $e->getMessage(), ['menu_id' => $menu->id]);
            return redirect()->back()->with('error', 'Failed to delete menu. Please try again.');
        }
    }
}
