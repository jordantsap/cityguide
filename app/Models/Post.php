<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;

    use HasTranslations;

    public array $translatable = ['title','slug','body'];

    public $fillable = ['title','slug','body','user_id','category_id','thumbnail'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        // Add a deleting event to delete the associated file
        self::deleting(function (Post $post) {
            // Check if the file exists
            Storage::disk('public')->delete($post->thumbnail); // Delete the file
        });
    }

    protected $casts = [
        'thumbnail' => 'array',
    ];

//    public function getRouteKeyName(): string
//    {
//        return 'slug';
//    }
}
