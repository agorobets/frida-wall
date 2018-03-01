<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pets()
    {
        return $this->belongsToMany(Pet::class);
    }
}
