<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fermentacija extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partija_grozdja_id',
        'datum',
        'temperatura',
        'secer',
        'faza',
        'napomena',
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
            'partija_grozdja_id' => 'integer',
            'datum' => 'date',
            'temperatura' => 'decimal:2',
            'secer' => 'decimal:2',
        ];
    }

    public function partijaGrozdja(): BelongsTo
    {
        return $this->belongsTo(PartijaGrozdja::class, 'partija_grozdjas_id');
    }
}
