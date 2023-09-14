<?php

namespace App\Models;

use FFI;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{
    use HasFactory;
    /* relazione one to one con la tabella user */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /* relazione many to many alla tabella specialization */
    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class);
    }
    /* relazione many to many alla tabella sponsors */
    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class);
    }
    /* relazione many to many alla tabella votes */
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(Vote::class);
    }
}
