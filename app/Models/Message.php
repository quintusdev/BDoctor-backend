<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'text', 'email', 'name', 'surname'];

    /* relazione tabella user */
    public function User(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
