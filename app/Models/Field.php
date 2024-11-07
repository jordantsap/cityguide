<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','title','type','class','multiple','required','placeholder','field_type_id'];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_field')
            ->using(CategoryField::class)
            ->withTimestamps();
    }

    public function fieldType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FieldType::class);
    }
        protected $casts = [
//            'title'=>'array',
//            'name'=>'array',
//            'slug'=>'array',
            'category_id'=>'array',
    ];
}
