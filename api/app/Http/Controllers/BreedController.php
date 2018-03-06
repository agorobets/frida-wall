<?php

namespace App\Http\Controllers;

use App\Http\Requests\BreedRequest;
use App\Http\Resources\BreedResource;
use App\Models\Breed;
use App\Models\Constants\ListItemStatus;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return BreedResource::collection(Breed::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BreedRequest  $request
     * @return BreedResource
     */
    public function store(BreedRequest $request)
    {
        $request->validate();
        $breed = Breed::create($request->validated());

        return new BreedResource($breed);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breed  $breed
     * @return BreedResource
     */
    public function show(Breed $breed)
    {
        return new BreedResource($breed);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BreedRequest  $request
     * @param  \App\Models\Breed  $breed
     * @return BreedResource
     */
    public function update(BreedRequest $request, Breed $breed)
    {
        $request->validate();
        $breed->fill($request->validated());
        $breed->save();

        return new BreedResource($breed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breed  $breed
     * @return BreedResource
     */
    public function destroy(Breed $breed)
    {
        $breed->delete();
        return new BreedResource($breed);
    }

    /**
     * Hides breed
     *
     * @param Breed $breed
     * @return BreedResource
     */
    public function hide(Breed $breed)
    {
        return $this->setStatus($breed, ListItemStatus::HIDDEN);
    }

    /**
     * Displays breed
     *
     * @param Breed $breed
     * @return BreedResource
     */
    public function display(Breed $breed)
    {
        return $this->setStatus($breed, ListItemStatus::DISPLAY);
    }

    /**
     * @param Breed $breed
     * @param int $status
     * @return BreedResource
     */
    protected function setStatus(Breed $breed, int $status)
    {
        $breed->status = $status;
        $breed->save();

        return new BreedResource($breed);
    }
}
