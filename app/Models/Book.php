<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $guarded = [];

    public function loans(): MorphMany
    {
        return $this->morphMany(Loan::class, 'loanable');
    }
}
