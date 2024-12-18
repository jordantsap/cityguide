<?php

namespace App\Models;

use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use HasPanelShield;
    use HasTranslations;

    public array $translatable = [
        'name',
//        'email',
//        'password',
        'username',
        'fullname',
        'username',
    ];

//    public function canAccessPanel(Panel $panel): bool
//    {
//        return $this->hasRole('panel_user');
//    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'fullname',
        'username',
//        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

//    public function roles(): BelongsToMany
//    {
//        return $this->belongsToMany(Role::class);
//    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function accommodations(): HasMany
    {
        return $this->hasMany(Accommodation::class);
    }
    public function venues(): HasMany
    {
        return $this->hasMany(Venue::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
    public function productTypes(): HasMany
    {
        return $this->hasMany(ProductType::class);
    }
    public function companyTypes(): HasMany
    {
        return $this->hasMany(CompanyType::class);
    }
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
    public function fieldTypes(): HasMany
    {
        return $this->hasMany(FieldType::class);
    }
}
