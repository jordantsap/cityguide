<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
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
}
