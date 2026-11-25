<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * L'inscription d'une personne à une session de formation.
 *
 * @property int $id
 * @property int $formation_session_id
 * @property int|null $user_id
 * @property string $nom
 * @property string $email
 * @property string $statut
 */
class Inscription extends Model
{
    /** Les statuts possibles d'une inscription, avec leur libellé affiché. */
    public const STATUTS = [
        'inscrit' => 'Inscrit',
        'present' => 'Présent',
        'absent' => 'Absent',
        'annule' => 'Annulé',
    ];

    protected $fillable = ['formation_session_id', 'user_id', 'nom', 'email', 'statut'];
        /** Valeurs par défaut, connues dès la création de l'objet (comme dans la base). */
    protected $attributes = ['statut' => 'inscrit'];

    /** L'inscription porte sur une session. */
    public function session(): BelongsTo
    {
        return $this->belongsTo(FormationSession::class, 'formation_session_id');
    }

    /** Le compte apprenant lié à l'inscription (à l'étape suivante). */
    public function apprenant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}