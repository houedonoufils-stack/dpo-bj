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
    public function services(): View
    {
        return view('site.services', [
            'services' => [
                ['titre' => 'Accompagnement aux dossiers APDP',
                 'texte' => "Nous préparons avec vous les déclarations et demandes d'autorisation, les annexes et les pièces, puis le dépôt et le suivi jusqu'à la décision.",
                 'livrables' => ['Dossier complet sur les formulaires officiels', 'Bordereau des pièces', 'Suivi des délais et relances']],
                ['titre' => 'DPO externe',
                 'texte' => "Un DPO qualifié exerce la fonction pour votre organisme par contrat de service (art. 430), outillé par Sitael.",
                 'livrables' => ['Dossier de désignation', 'Plan annuel de contrôle', 'Rapport annuel à l\'APDP (art. 387)']],
                ['titre' => 'Audit de conformité',
                 'texte' => 'Inventaire de vos traitements, état de vos formalités et plan d\'action priorisé.',
                 'livrables' => ['Registre des traitements', 'Plan de formalités', 'Rapport de direction']],
                ['titre' => "Analyse d'impact (AIPD)",
                 'texte' => "Pour les traitements à risque élevé (art. 428), jusqu'à la consultation préalable de l'APDP si nécessaire (art. 429).",
                 'livrables' => ['AIPD complète', 'Plan de mesures', 'Dossier de consultation préalable']],
                ['titre' => 'Gestion de crise après une violation',
                 'texte' => 'Ligne prioritaire, qualification de l\'incident et notifications « sans délai » à l\'APDP et aux personnes (art. 427).',
                 'livrables' => ['Chronologie horodatée', 'Notifications', 'Retour d\'expérience']],
                ['titre' => 'Mise en conformité de votre site web',
                 'texte' => 'Cookies et traceurs, mentions d\'information (art. 415), formulaire complémentaire « site web » de l\'APDP.',
                 'livrables' => ['Analyse du site', 'Mentions et politique de confidentialité', 'Formulaire « site web » prérempli']],
            ],
        ]);
    }
}