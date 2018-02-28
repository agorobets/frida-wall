<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'kind_id', 'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }

    /**
     * @param string $name
     */
    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = ucfirst($name);
    }
}
