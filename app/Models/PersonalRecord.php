<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalRecord extends Model
{
    protected $fillable = [
        'user_id',
        'movement_id',
        'value',
        'date',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function movement(): BelongsTo{
        return $this->belongsTo(Movement::class);
    }

}
