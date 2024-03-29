<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'slug', 'status',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];

    public function menubar()
    {
        return $this->hasMany(Menubar::class, 'page_id');
    }
}
