<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'client',
        'project_date',
        'image_path',
        'user_id'
    ];

    protected $casts = [
        'project_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
