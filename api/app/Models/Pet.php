<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'kind_id', 'breed_id', 'nickname', 'display_name', 'description',
        'born_at', 'died_at', 'age', 'gender',
    ];

    /**
     * @var array
     */
    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,

        'born_at',
        'died_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * @param string $value
     */
    public function setNicknameAttribute(string $value)
    {
        $this->attributes['nickname'] = strtolower($value);
    }
}
