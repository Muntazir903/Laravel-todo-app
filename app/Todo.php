<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'iscompleted'
    ];

    protected $casts = [
        'iscompleted' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
