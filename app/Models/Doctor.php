<?php

namespace App\Models;

use FFI;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'address', 'cv', 'picture', 'phone', 'medical_service', 'avr_vote'];

    /* relazione one to one con la tabella user */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /* relazione one to many tabella reviews */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    /* relazione many to many alla tabella specialization */
    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class, 'specialization_doctor', 'doctor_id', 'specialization_id');
    }
    /* relazione many to many alla tabella sponsors */
    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class);
    }
    /* relazione many to many alla tabella votes */
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(Vote::class, 'vote_doctor');
    }
}
