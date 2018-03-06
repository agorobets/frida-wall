<?php

namespace App\Models;

use App\Models\Constants\ListItemStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Breed
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property Kind|\Illuminate\Database\Eloquent\Relations\BelongsTo $kind
 */
class Breed extends Model
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
}
