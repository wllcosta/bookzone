<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'favorites');
    }
}
