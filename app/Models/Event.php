<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name','slug','user_id','venue_id'];

    public array $translatable = ['name','slug'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function venue(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }
//
//    public function rooms(): HasMany
//    {
//        return $this->hasMany(Room::class);
//    }

}
