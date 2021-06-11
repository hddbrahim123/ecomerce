<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('success_message')){
            toast(session('success_message'),'success');
        }

        $banners = Banner::all();
        return view('Admin.Banners.index',[
            'banners'=>$banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('banners');
        }
        $data = $request->all();
        $data['image'] = $path;
        $data['slug'] = Str::slug($data['title'] ,'-');

        $banner = Banner::create($data);
        return redirect()->route('banners.index')->withSuccessMessage('Banner Created SuccussFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('Admin.Banners.show',[
            'banner'=>$banner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('Admin.Banners.create',[
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->status = $request->status;

        if($request->hasFile('image')){
            Storage::delete($banner->image);
            $path = $request->file('image')->store('banners');
            $banner->image = $path;            
        }
        $banner->update();
        return redirect()->route('banners.index')->withSuccessMessage('Banner Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        Storage::delete($banner->image);
        $banner->delete();
        return redirect()->route('banners.index')->withSuccessMessage('Banner Deleted SuccussFully');
    }
}
