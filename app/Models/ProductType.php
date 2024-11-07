<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class ProductType extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $fillable = ['name','slug','user_id'];

    public array $translatable = ['name','slug'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(Variant::class, 'product_type_variant');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
