<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'text', 'email'];

    /* relazione tabella doctor */
    public function doctor(): BelongsTo
    {
        return $this->BelongsTo(Doctor::class);
    }
    public function votes()
    {
        return $this->belongsToMany(Vote::class, 'vote_doctor', 'review_id', 'vote_id')
                    ->withPivot('doctor_id');
    }
}
