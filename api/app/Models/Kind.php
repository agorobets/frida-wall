<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @param string $name
     */
    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = ucfirst($name);
    }
}
