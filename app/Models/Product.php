<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = ['name','slug','description'];

    protected $fillable = ['name','slug','description','user_id','company_id','product_type_id','sku','price','quantity'];

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

//    protected $casts = [
//        'product_type_id' => 'array',
//    ];
}
