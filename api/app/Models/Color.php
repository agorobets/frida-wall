<?php

namespace App\Models;

use App\Models\Constants\ListItemStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Color
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
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
}
