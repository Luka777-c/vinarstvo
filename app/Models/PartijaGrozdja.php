<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PartijaGrozdja extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'partija_grozdjas';

    protected $fillable = [
        'sorta',
        'kolicina',
        'status',
        'datum',
        'napomena',
    ];

    protected $casts = [
        'datum' => 'date',
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
            'datum' => 'date',
        ];
    }

    public function fermentacijas(): HasMany
    {
        return $this->hasMany(Fermentacija::class);
    }

    public function vinos(): HasMany
    {
        return $this->hasMany(Vino::class);
    }
}
