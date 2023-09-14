<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    /* relazione tabella doctor */
    public function doctor(): BelongsTo
    {
        return $this->BelongsTo(Doctor::class);
    }
}
