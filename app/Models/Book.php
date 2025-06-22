<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'pdf_path', 'user_id'];

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function isFavoritedBy(User $user): bool
    {
        return $this->favoritedBy()->where('user_id', $user->id)->exists();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}