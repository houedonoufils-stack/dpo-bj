<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LogicielController extends Controller
{
    /** Page « Outil » : Sitael web et mobile sur une seule page (demande du porteur du projet). */
    public function outil(): View
    {
        return view('site.outil', [
            'modules' => $this->modules(),
            'garanties' => $this->garanties(),
            'ecrans' => $this->ecrans(),
        ]);
    }

    /** Les modules de Sitael web (sections 3 et 4.1 du cahier des charges). 'phare' = mis en avant. */
    private function modules(): array
    {
        return [
            ['titre' => 'Qualification du régime', 'phare' => true,
             'texte' => "Un questionnaire classe chaque traitement : hors champ, dispensé, norme simplifiée, déclaration, autorisation ou acte réglementaire, avec l'article applicable."],
            ['titre' => 'Dossiers APDP', 'phare' => true,
             'texte' => "Formulaires officiels préremplis, liste des pièces, suivi du délai de l'art. 412 : alerte à J+45, échéance à J+60 ou J+90, courrier de relance."],
            ['titre' => 'Registre des traitements', 'phare' => true,
             'texte' => "Fiches calquées sur le formulaire unique de l'APDP, traitements types par secteur, export PDF et tableur (art. 435)."],
            ['titre' => "Analyses d'impact (AIPD)", 'phare' => true,
             'texte' => "Déclencheurs de l'art. 428, grille gravité × vraisemblance, avis du DPO, consultation préalable de l'APDP (art. 429)."],
            ['titre' => 'Violations de données', 'phare' => true,
             'texte' => "Registre des violations, compte à rebours interne de 72 h, modèles de notification à l'APDP et aux personnes (art. 427)."],
            ['titre' => 'Délégué à la protection des données', 'phare' => false,
             'texte' => 'Test de désignation obligatoire (art. 430), dossier de désignation, journal des missions et des signalements.'],
            ['titre' => 'Transferts hors du Bénin', 'phare' => false,
             'texte' => 'Inventaire des flux, fondement (art. 391-392), autorisation et revue annuelle de chaque transfert.'],
            ['titre' => 'Droits des personnes', 'phare' => false,
             'texte' => 'Portail public de demandes, délais propres à chaque droit : 30, 45 ou 60 jours, alertes à mi-délai et à J-5.'],
            ['titre' => 'Consentements et prospection', 'phare' => false,
             'texte' => "Mentions d'information (art. 415-416), registre des consentements avec preuve, liste d'opposition."],
            ['titre' => 'Données sensibles et mineurs', 'phare' => false,
             'texte' => "Détection des catégories de l'art. 394, exceptions documentées, consentement parental sous 16 ans (art. 446)."],
            ['titre' => 'Sécurité et rapport annuel', 'phare' => false,
             'texte' => "Check-list des mesures de l'art. 426, rapport annuel à l'APDP généré à partir du registre (art. 387)."],
            ['titre' => 'Contrôles et cabinets DPO', 'phare' => false,
             'texte' => 'Préparation aux contrôles, suivi des mises en demeure, espaces cloisonnés par client et vue consolidée.'],
        ];
    }

    /** Les garanties de sécurité de Sitael (section 5 du cahier des charges). */
    private function garanties(): array
    {
        return [
            ['titre' => 'Hébergé au Bénin', 'texte' => 'Pas de transfert hors du pays pour vos données (art. 391 et 407).'],
            ['titre' => 'Double authentification', 'texte' => 'Code par application ou SMS, verrouillage après plusieurs échecs.'],
            ['titre' => 'Journal non modifiable', 'texte' => 'Accès et modifications horodatés, conservés au moins 12 mois.'],
            ['titre' => 'Données cloisonnées', 'texte' => 'Chaque organisation ne voit que ses propres données.'],
        ];
    }

    /** Les écrans de Sitael mobile (section 5.2 du cahier des charges). */
    private function ecrans(): array
    {
        return [
            ['titre' => 'Connexion sécurisée',
             'texte' => 'Code reçu par SMS ou application, puis déverrouillage par empreinte ou visage. La déconnexion efface les données du téléphone.'],
            ['titre' => 'Tableau de bord et alertes',
             'texte' => 'Score, échéances APDP, délais de réponse dépassés, demandes de droits en retard.'],
            ['titre' => 'Tâches et notifications',
             'texte' => 'Notifications neutres, sans aucune donnée personnelle.'],
            ['titre' => 'Déclarer une violation',
             'texte' => 'En moins de 2 minutes depuis le terrain : le compte à rebours de 72 h démarre et le DPO est alerté.'],
            ['titre' => 'Mode atelier hors ligne',
             'texte' => "Fiches et questionnaires remplis sans réseau, puis synchronisés ; les conflits sont résolus à l'écran."],
            ['titre' => 'Inventaire des capteurs',
             'texte' => "Caméras et pointeuses avec photo, emplacement et panneau d'information, pour le formulaire « capteurs » de l'APDP."],
            ['titre' => 'Validation des dossiers APDP',
             'texte' => "Pièces prêtes ou manquantes, déclaration sur l'honneur du responsable du traitement."],
            ['titre' => 'Mode guichet',
             'texte' => "Saisie d'une demande de droit au guichet, avec l'échéance propre au droit demandé."],
        ];
    }
}