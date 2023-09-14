<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Messages extends Model
{
    use HasFactory;
    /* relazione tabella user */
    public function User(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
