<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Http\Resources\ColorResource;
use App\Models\Color;
use App\Models\Constants\ListItemStatus;

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
     * @param ColorRequest $request
     * @return ColorResource
     */
    public function store(ColorRequest $request)
    {
        $request->validate();
        $color = Color::create($request->validated());

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
     * @param  ColorRequest  $request
     * @param  \App\Models\Color  $color
     * @return ColorResource
     */
    public function update(ColorRequest $request, Color $color)
    {
        $request->validate();
        $color->fill($request->validated());
        $color->save();

        return new ColorResource($color);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return ColorResource
     */
    public function destroy(Color $color)
    {
        $color->delete();

        return new ColorResource($color);
    }

    /**
     * Hides color
     *
     * @param Color $color
     * @return ColorResource
     */
    public function hide(Color $color)
    {
        return $this->setStatus($color, ListItemStatus::HIDDEN);
    }

    /**
     * Displays color
     *
     * @param Color $color
     * @return ColorResource
     */
    public function display(Color $color)
    {
        return $this->setStatus($color, ListItemStatus::DISPLAY);
    }

    /**
     * @param Color $color
     * @param int $status
     * @return ColorResource
     */
    protected function setStatus(Color $color, int $status)
    {
        $color->status = $status;
        $color->save();

        return new ColorResource($color);
    }
}
