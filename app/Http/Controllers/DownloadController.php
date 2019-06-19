<?php

namespace App\Http\Controllers;

use App\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "555";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $path = 'userss';
        if ($image) {
            $data = getimagesize($image);
            $width = $data[0];
            $height = $data[1];
            $image_filename = $image->getClientOriginalName();
            $image_name = $image_filename;
            $public_path = $path . '/';
            $destination = base_path() . "/storage/app/images/" . $public_path;
            $tmp = $destination . $image_name;

            // $newimage = Image::make($image->getRealPath())->resize($width, $height)->save($tmp);
            $image->move($destination, $image_name);

            return response()->json(['image' => $tmp], 201);
        }
        return response()->json(['error' => "image not found"], 401);

    }

    /**πap
     * Display the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        //
    }
}
