<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SolutionsController extends Controller
{
    /** Page « Solutions par secteur » (section 4.1 du cahier des charges). */
    public function secteurs(): View
    {
        return view('site.secteurs', [
            'secteurs' => config('secteurs'),
        ]);
    }

    /** Page « Services d'accompagnement », sur devis (section 4.1). */
        /** Page « Services » : deux offres (décision du porteur du projet, 25/11/2026). */
    public function services(): View
    {
        return view('site.services', [
            // Offre 1 : accompagnement à la mise en conformité
            'accompagnement' => [
                ['titre' => 'Accompagnement aux dossiers APDP',
                 'texte' => "Nous préparons avec vous les déclarations et demandes d'autorisation, les annexes et les pièces, puis le dépôt et le suivi jusqu'à la décision."],
                ['titre' => 'DPO externe',
                 'texte' => 'Un DPO qualifié exerce la fonction pour votre organisme par contrat de service (art. 430), outillé par Sitael.'],
                ['titre' => 'Audit de conformité',
                 'texte' => "Inventaire de vos traitements, état de vos formalités et plan d'action priorisé."],
                ['titre' => "Analyse d'impact (AIPD)",
                 'texte' => "Pour les traitements à risque élevé (art. 428), jusqu'à la consultation préalable de l'APDP si nécessaire (art. 429)."],
                ['titre' => 'Gestion de crise après une violation',
                 'texte' => "Ligne prioritaire, qualification de l'incident et notifications « sans délai » à l'APDP et aux personnes (art. 427)."],
                ['titre' => 'Mise en conformité de votre site web',
                 'texte' => "Cookies et traceurs, mentions d'information (art. 415), formulaire complémentaire « site web » de l'APDP."],
            ],

            // Offre 2 : formation à Sitael pour maîtriser le métier de DPO
            'formation' => [
                'Comprendre le Livre V du Code du numérique et le rôle du DPO (art. 430 à 432).',
                'Prendre en main Sitael : registre, qualification du régime, dossiers APDP, délais.',
                "Travaux pratiques sur une organisation fictive : traiter une demande de droit, déclarer une violation, mener une AIPD.",
                'Valider ses acquis par un quiz en ligne et obtenir une attestation vérifiable.',
            ],
        ]);
    }
}