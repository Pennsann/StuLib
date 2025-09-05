<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'category',
        'status', // available / unavailable
    ];

    /**
     * Relationship: Users who borrowed this book.
     * Uses pivot table 'book_user' with additional fields: borrowed_at, return_date, returned_at.
     */
    public function borrowers()
{
    return $this->belongsToMany(User::class, 'borrowed_books')
                ->withPivot('borrowed_at', 'return_date', 'returned_at')
                ->withTimestamps();
}


    /**
     * Optional helper: Check if the book is currently available.
     */
    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }
}
