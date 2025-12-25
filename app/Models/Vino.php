<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vino extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv',
        'tip',
        'kolicina',
        'datum_proizvodnje',
        'partija_grozdja_id',
        'bure_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'datum_proizvodnje' => 'date',
            'partija_grozdja_id' => 'integer',
            'bure_id' => 'integer',
        ];
    }

    public function partijaGrozdja(): BelongsTo
    {
        return $this->belongsTo(PartijaGrozdja::class);
    }

    public function bure(): BelongsTo
    {
        return $this->belongsTo(Bure::class);
    }
}
