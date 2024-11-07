<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Translatable\HasTranslations;

class Company extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = ['name','slug','address'];

    protected $fillable = ['name','slug','address','phone','user_id','company_type_id'];

    public function companyType():belongsTo
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function fields(): HasManyThrough
    {
        return $this->hasManyThrough(Field::class, Category::class);
    }

//    public function getRouteKeyName(): string
//    {
//        return 'slug';
//    }

//    protected $casts = [
//        'fields'=>'json',
//        'name'=>'array',
//        'slug'=>'array',
//        'company_type_id'=>'array',
//    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
