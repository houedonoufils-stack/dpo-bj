<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

/**
 * Demande reçue par le formulaire de contact du site dpo.bj.
 * Conservée 3 ans après sa réception, puis supprimée automatiquement.
 */
class DemandeContact extends Model
{
    use Prunable;

    /** Les objets proposés dans la liste déroulante. */
    public const OBJETS = [
        'demo' => 'Demander une démo',
        'dossier' => 'Accompagnement à un dossier APDP',
        'dpo' => 'DPO externe',
        'formation' => 'Formation',
        'devis' => 'Demande de devis',
        'autre' => 'Autre',
    ];

    /** Le texte exact présenté à côté de la case de consentement. */
    public const TEXTE_CONSENTEMENT = "J'accepte de recevoir des informations commerciales de dpo.bj (nouveautés, formations, webinaires). Je peux retirer mon accord à tout moment.";

    /** Durée de conservation, en années. */
    public const CONSERVATION_ANNEES = 3;

    protected $fillable = [
        'nom', 'organisation', 'email', 'telephone', 'objet', 'message',
        'consentement_prospection', 'consentement_texte', 'consentement_le',
    ];

    protected function casts(): array
    {
        return [
            'consentement_prospection' => 'boolean',
            'consentement_le' => 'datetime',
        ];
    }

    /** Les demandes à supprimer automatiquement (art. 383 : durée limitée). */
    public function prunable(): Builder
    {
        return static::query()->where('created_at', '<=', now()->subYears(self::CONSERVATION_ANNEES));
    }
}