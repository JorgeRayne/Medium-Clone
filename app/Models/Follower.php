<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public const UPDATED_AT = null;

    protected $fillable =[
        'user_id',
        'follower_id'
    ];

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function follower()
    {
        return $this->belongsTo(User::class);
    }
}
