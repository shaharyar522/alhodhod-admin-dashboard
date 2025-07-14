<?php

namespace App\Http\Controllers;

use App\Models\BannerAdd;
use Illuminate\Http\Request;

class BannerAddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner_add = BannerAdd::get();
        return view('banner_add.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BannerAdd $bannerAdd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BannerAdd $bannerAdd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BannerAdd $bannerAdd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BannerAdd $bannerAdd)
    {
        //
    }
}
