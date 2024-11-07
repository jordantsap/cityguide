<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = ['name','slug'];

    protected $fillable = ['name','slug','user_id'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'category_field')
            ->using(CategoryField::class)
            ->withTimestamps();
    }
}
