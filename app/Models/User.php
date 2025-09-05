<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Book;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',        // manually assigned student ID
        'name',
        'email',
        'password',
        'role',      // 'student' or 'admin'
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

    /**
     * Relationship: Books borrowed by this user.
     * Uses pivot table 'book_user' with additional fields: borrowed_at, return_date, returned_at.
     */
    public function borrowedBooks()
{
    return $this->belongsToMany(Book::class, 'borrowed_books')
                ->withPivot('borrowed_at', 'return_date', 'returned_at')
                ->withTimestamps();
}


    /**
     * Optional helper: Check if user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Optional helper: Check if user is a student.
     */
    public function isStudent(): bool
    {
        return $this->role === 'student';
    }
}
