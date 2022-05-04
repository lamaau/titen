<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasUuid,
        HasRoles,
        HasFactory,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_logged_in_at',
    ];

    protected $appends = [
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_logged_in_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function profilePicture(): Attribute
    {
        return new Attribute(
            get: fn ($value) => is_null($value) ? "https://ui-avatars.com/api/?name={$this->username}&amp;color=FFFFFF&amp;background=111827" : $value,
        );
    }

    public function username(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function role(): Attribute
    {
        $role = auth()->user()?->roles()->pluck('name')->first();

        return new Attribute(
            get: fn ($value) => ucfirst($role)
        );
    }

    public function scopeWithoutAdmin(Builder $query): Builder
    {
        return $query->whereHas('roles', fn ($query) => $query->where($this->qualifyColumn('roles.name'), '!=', 'Admin'));
    }

    public function isAdmin(): bool
    {
        return $this->role === 'Admin';
    }
}
