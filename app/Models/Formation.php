<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Une formation de l'Académie dpo.bj (ex. « Exercer la fonction de DPO au Bénin »).
 *
 * @property int $id
 * @property string $slug
 * @property string $titre
 * @property string|null $public
 * @property string|null $duree
 * @property string|null $description
 * @property bool $active
 */
class Formation extends Model
{
    protected $fillable = ['slug', 'titre', 'public', 'duree', 'description', 'active'];

    protected function casts(): array
    {
        return ['active' => 'boolean'];
    }

    /** Une formation a plusieurs sessions. */
    public function sessions(): HasMany
    {
        return $this->hasMany(FormationSession::class);
    }
}