<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'category',
        'status',
    ];
    
    public function borrowers()
{
    return $this->belongsToMany(User::class, 'borrowed_books')
                ->withPivot('borrowed_at', 'return_date', 'returned_at')
                ->withTimestamps();
}

}
