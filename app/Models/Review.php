<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'name', 'surname', 'text', 'email'];

    /* relazione tabella doctor */
    public function doctor(): BelongsTo
    {
        return $this->BelongsTo(Doctor::class);
    }
}
