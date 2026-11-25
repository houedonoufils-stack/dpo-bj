<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Une session d'une formation : une date, un formateur, un lien de visio.
 *
 * @property int $id
 * @property int $formation_id
 * @property int|null $formateur_id
 * @property Carbon $debut
 * @property Carbon $fin
 * @property string|null $lien_visio
 * @property int|null $places
 * @property string $statut
 */
class FormationSession extends Model
{
    /** Les statuts possibles d'une session, avec leur libellé affiché. */
    public const STATUTS = [
        'planifiee' => 'Planifiée',
        'terminee' => 'Terminée',
        'annulee' => 'Annulée',
    ];

    protected $fillable = ['formation_id', 'formateur_id', 'debut', 'fin', 'lien_visio', 'places', 'statut'];
        /** Valeurs par défaut, connues dès la création de l'objet (comme dans la base). */
    protected $attributes = ['statut' => 'planifiee'];
    protected function casts(): array
    {
        return [
            'debut' => 'datetime',
            'fin' => 'datetime',
        ];
    }

    /** La session appartient à une formation. */
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }

    /** Le formateur qui anime la session (un utilisateur avec le rôle « formateur »). */
    public function formateur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'formateur_id');
    }

    /** Les personnes inscrites à la session. */
    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }


        /**
     * Sessions non annulées qui chevauchent le créneau donné.
     * Deux créneaux se chevauchent si l'un commence avant la fin de l'autre.
     */
    public static function surLeCreneau(string $debut, string $fin, ?int $sauf = null): Builder
    {
        return static::query()
            ->where('statut', '!=', 'annulee')
            ->where('debut', '<', $fin)
            ->where('fin', '>', $debut)
            ->when($sauf, fn (Builder $query) => $query->whereKeyNot($sauf));
    }
    
}