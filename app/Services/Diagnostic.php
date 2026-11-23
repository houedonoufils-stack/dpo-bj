<?php

namespace App\Services;

/**
 * Diagnostic gratuit du site dpo.bj (section 4.1 du cahier des charges).
 *
 * Résultat INDICATIF : les règles sont à valider par le juriste béninois.
 */
class Diagnostic
{
    /**
     * Les 10 questions, dans l'ordre d'affichage.
     * Les 7 premières repèrent les formalités ; les 3 dernières mesurent ce qui est déjà fait.
     */
    public const QUESTIONS = [
        'public' => [
            'texte' => 'Êtes-vous une autorité ou un organisme public (ministère, agence, commune, établissement public) ?',
            'article' => 'art. 411 et 430',
        ],
        'sensibles' => [
            'texte' => 'Traitez-vous des données sensibles : santé, origine, opinions politiques, convictions religieuses, appartenance syndicale, vie sexuelle, données génétiques ?',
            'article' => 'art. 394 et 407',
        ],
        'biometrie' => [
            'texte' => 'Utilisez-vous la biométrie : empreintes digitales, reconnaissance faciale, pointeuse biométrique ?',
            'article' => 'art. 407',
        ],
        'identifiant' => [
            'texte' => "Utilisez-vous le numéro personnel d'identification (NPI) ou un identifiant national similaire ?",
            'article' => 'art. 407',
        ],
        'transfert' => [
            'texte' => "Des données partent-elles hors du Bénin : maison mère, hébergement ou logiciel en ligne à l'étranger ?",
            'article' => 'art. 391 et 407',
        ],
        'interconnexion' => [
            'texte' => "Reliez-vous vos fichiers à ceux d'un autre organisme (interconnexion, échange automatique de données) ?",
            'article' => 'art. 393 et 407',
        ],
        'grande_echelle' => [
            'texte' => 'Suivez-vous des personnes de façon régulière et systématique à grande échelle : clients, abonnés, géolocalisation, vidéosurveillance de lieux publics ?',
            'article' => 'art. 428 et 430',
        ],
        'dpo' => [
            'texte' => 'Avez-vous désigné un délégué à la protection des données (DPO) ?',
            'article' => 'art. 430',
        ],
        'registre' => [
            'texte' => 'Tenez-vous un registre écrit de vos traitements de données ?',
            'article' => 'art. 435',
        ],
        'recepisse' => [
            'texte' => "Avez-vous déjà obtenu un récépissé ou une autorisation de l'APDP pour vos traitements ?",
            'article' => 'art. 405 et 407',
        ],
    ];

    /** Les réponses « oui » qui imposent une autorisation préalable (art. 407). */
    private const MOTIFS_AUTORISATION = [
        'sensibles' => 'données sensibles',
        'biometrie' => 'biométrie',
        'identifiant' => "numéro d'identification national",
        'transfert' => 'transfert hors du Bénin',
        'interconnexion' => 'interconnexion de fichiers',
    ];

    /**
     * Calcule le résultat à partir des réponses.
     *
     * @param  array<string, string>  $reponses  'oui' ou 'non' pour chaque question
     * @return array{score: int, niveau: string, dpo_obligatoire: bool, aipd_probable: bool, formalites: list<string>}
     */
    public function evaluer(array $reponses): array
    {
        // Petite fonction utilitaire : la réponse à cette question est-elle « oui » ?
        $oui = fn (string $cle): bool => ($reponses[$cle] ?? 'non') === 'oui';

        // DPO obligatoire : organisme public, ou suivi systématique à grande échelle (art. 430)
        $dpoObligatoire = $oui('public') || $oui('grande_echelle');

        // AIPD probable : suivi à grande échelle ou biométrie (art. 428)
        $aipdProbable = $oui('grande_echelle') || $oui('biometrie');

        $formalites = [];

        if ($oui('public')) {
            $formalites[] = "Acte réglementaire : décret en Conseil des ministres après avis motivé de l'APDP (art. 411).";
        }

        $motifs = [];
        foreach (self::MOTIFS_AUTORISATION as $cle => $libelle) {
            if ($oui($cle)) {
                $motifs[] = $libelle;
            }
        }
        if ($motifs !== []) {
            $formalites[] = "Autorisation préalable de l'APDP (art. 407) pour : ".implode(', ', $motifs).'.';
        }

        // La dispense grâce au DPO ne vaut pas pour les autorités publiques (art. 408)
        if (! $oui('public')) {
            $formalites[] = $oui('dpo')
                ? 'Vos autres traitements : dispense de déclaration possible si votre DPO tient un registre (art. 408).'
                : 'Vos autres traitements : déclaration préalable (art. 405), sauf dispense (art. 410) ou norme simplifiée (art. 406).';
        }

        if ($aipdProbable) {
            $formalites[] = "Analyse d'impact (AIPD) probable avant la mise en œuvre (art. 428).";
        }

        if ($dpoObligatoire && ! $oui('dpo')) {
            $formalites[] = "Désignation d'un DPO obligatoire (art. 430).";
        }

        // Score sur 100 : registre (30) + récépissé ou autorisation (40) + DPO (30).
        // Sans DPO, l'organisme garde 15 points si le DPO n'est pas obligatoire pour lui.
        $score = ($oui('registre') ? 30 : 0)
            + ($oui('recepisse') ? 40 : 0)
            + ($oui('dpo') ? 30 : ($dpoObligatoire ? 0 : 15));

        $niveau = match (true) {
            $score >= 75 => 'bon',
            $score >= 40 => 'à améliorer',
            default => 'urgent',
        };

        return [
            'score' => $score,
            'niveau' => $niveau,
            'dpo_obligatoire' => $dpoObligatoire,
            'aipd_probable' => $aipdProbable,
            'formalites' => $formalites,
        ];
    }
}