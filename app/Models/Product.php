<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function fields(): HasManyThrough
    {
        return $this->hasManyThrough(Field::class, Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(Variant::class,'product_variant');
    }
}
