<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Loan extends Model
{
    protected $table = 'loans';
    protected $guarded = [];

    public function loanable(): MorphTo
    {
        return $this->morphTo();
    }
}
