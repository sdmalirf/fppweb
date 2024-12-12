<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Important extends Model
{
    protected $table = 'important';

    protected $fillable = [
        'name',
        'date',
        'user_id',
        'is_done',
        'is_fav'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
