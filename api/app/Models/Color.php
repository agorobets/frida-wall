<?php

namespace App\Models;

use App\Models\Constants\ListItemStatus;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * @var array
     */
    protected $attributes = [
        'status' => ListItemStatus::HIDDEN,
    ];

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
