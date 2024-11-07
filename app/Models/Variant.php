<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','user_id'];

    public function productTypes(): BelongsToMany
    {
        return $this->belongsToMany(ProductType::class, 'product_type_variant');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_variant');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
