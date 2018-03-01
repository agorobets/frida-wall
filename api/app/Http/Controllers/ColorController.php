<?php

namespace App\Http\Controllers;

use App\Http\Resources\ColorResource;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ColorResource::collection(Color::all());
    }

    /**
     * @param Request $request
     * @return ColorResource
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:colors|max:255'
        ]);

        $color = Color::create($validatedData);
        return new ColorResource($color);
    }

    /**
     * Display the specified resource.
     *
     * @param Color $color
     * @return ColorResource
     */
    public function show(Color $color)
    {
        return new ColorResource($color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:colors|max:255'
        ]);

        $color->fill($validatedData);
        $color->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
