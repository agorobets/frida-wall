<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BreedResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'kind' => new KindResource($this->kind),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'status' => $this->status,
        ];
    }
}
