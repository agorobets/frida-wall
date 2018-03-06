<?php

namespace App\Http\Controllers;

use App\Http\Requests\KindRequest;
use App\Http\Resources\KindResource;
use App\Models\Constants\ListItemStatus;
use App\Models\Kind;

class KindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return KindResource::collection(Kind::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  KindRequest $request
     * @return KindResource
     */
    public function store(KindRequest $request)
    {
        $request->validate();
        $kind = Kind::create($request->validated());

        return new KindResource($kind);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kind  $kind
     * @return KindResource
     */
    public function show(Kind $kind)
    {
        return new KindResource($kind);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  KindRequest  $request
     * @param  \App\Models\Kind  $kind
     * @return KindResource
     */
    public function update(KindRequest $request, Kind $kind)
    {
        $request->validate();
        $kind->fill($request->validated());
        $kind->save();

        return new KindResource($kind);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kind  $kind
     * @return KindResource
     */
    public function destroy(Kind $kind)
    {
        $kind->delete();
        return new KindResource($kind);
    }

    /**
     * Hides kind
     *
     * @param Kind $kind
     * @return KindResource
     */
    public function hide(Kind $kind)
    {
        return $this->setStatus($kind, ListItemStatus::HIDDEN);
    }

    /**
     * Displays kind
     *
     * @param Kind $kind
     * @return KindResource
     */
    public function display(Kind $kind)
    {
        return $this->setStatus($kind, ListItemStatus::DISPLAY);
    }

    /**
     * @param Kind $kind
     * @param int $status
     * @return KindResource
     */
    protected function setStatus(Kind $kind, int $status)
    {
        $kind->status = $status;
        $kind->save();

        return new KindResource($kind);
    }
}
