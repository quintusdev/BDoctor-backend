<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /* relazione many to many con tabella doctor */
    public function doctor()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
