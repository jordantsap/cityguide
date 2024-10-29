<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category():belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function fields(): HasManyThrough
    {
        return $this->hasManyThrough(Field::class, Category::class);
    }

    protected $casts = [
      'fields'=>'json'
    ];
}