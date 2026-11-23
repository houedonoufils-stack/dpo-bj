<?php

/*
|--------------------------------------------------------------------------
| Formulaires de l'APDP (section 3.14 du cahier des charges)
|--------------------------------------------------------------------------
| Les 13 documents de la rubrique Formulaires de service.apdp.bj.
| 'fichier' : nom du fichier officiel placé dans public/formulaires/
| (null tant qu'il n'est pas ajouté). Notices rédigées par dpo.bj.
*/

return [

    'source' => 'https://service.apdp.bj',
    'releve_le' => '22/11/2026',

    'liste' => [
        [
            'titre' => 'Formulaire unique de formalités préalables',
            'categorie' => 'Formulaire principal',
            'articles' => 'art. 407 et 409',
            'contenu' => 'Six parties : responsable et représentant légal, traitement envisagé, principes, sécurité, droits des personnes, traitements antérieurs, registre et DPO ; déclaration sur l\'honneur.',
            'requis' => 'Tout traitement soumis à déclaration ou à autorisation.',
            'notice' => "Remplissez une fiche par traitement. Les réponses « oui » de la partie II-H déclenchent les annexes 1 à 4.",
            'fichier' => null,
        ],
        [
            'titre' => 'Annexe 1 – Sous-traitance',
            'categorie' => 'Annexe',
            'articles' => 'art. 386',
            'contenu' => 'Intervenants, données accédées et durée, opérations, contrat et garanties, démarche APDP du sous-traitant, sécurité.',
            'requis' => 'Recours à un sous-traitant (partie II-H-1).',
            'notice' => 'Joignez le contrat de sous-traitance et les garanties de sécurité du prestataire.',
            'fichier' => null,
        ],
        [
            'titre' => 'Annexe 2 – Communication',
            'categorie' => 'Annexe',
            'articles' => 'art. 407',
            'contenu' => 'Destinataires au Bénin et dans la CEDEAO, finalité, texte ou consentement, modalités, sécurité, information préalable.',
            'requis' => 'Communication de données à des tiers au Bénin ou dans la CEDEAO (II-H-2).',
            'notice' => 'Indiquez le texte de loi ou le consentement qui autorise chaque communication.',
            'fichier' => null,
        ],
        [
            'titre' => 'Annexe 3 – Interconnexion',
            'categorie' => 'Annexe',
            'articles' => 'art. 393',
            'contenu' => 'Fichiers reliés et leurs références APDP, modalités (API, service web), durée, risques, architecture de sécurité.',
            'requis' => 'Interconnexion de fichiers (II-H-3).',
            'notice' => 'Citez les références des récépissés ou autorisations des fichiers reliés.',
            'fichier' => null,
        ],
        [
            'titre' => 'Annexe 4 – Transfert',
            'categorie' => 'Annexe',
            'articles' => 'art. 391 et 392',
            'contenu' => 'Destinataires et lien avec le responsable, pays et autorité de protection, niveau de protection, volume, mode et support, garanties.',
            'requis' => 'Transfert de données vers un pays tiers (II-H-4).',
            'notice' => "Pensez aux services en ligne hébergés à l'étranger : messagerie, stockage, logiciels.",
            'fichier' => null,
        ],
        [
            'titre' => 'Formulaire complémentaire – Site web',
            'categorie' => 'Formulaire complémentaire',
            'articles' => 'art. 415',
            'contenu' => 'Données de navigation, finalités, cookies et traceurs, langages, CMS et extensions, certificat TLS, hébergeur, documentation légale.',
            'requis' => 'Traitement de type site web ou application.',
            'notice' => "Le scanner de site de dpo.bj aidera à repérer les cookies et l'hébergeur.",
            'fichier' => null,
        ],
        [
            'titre' => 'Formulaire complémentaire – Capteurs',
            'categorie' => 'Formulaire complémentaire',
            'articles' => 'art. 406',
            'contenu' => 'Images, empreintes, voix, température, géolocalisation : équipements, technologie, réseau, emplacements, nombre de capteurs, affichage et pictogrammes.',
            'requis' => 'Vidéosurveillance, photographie ou biométrie.',
            'notice' => 'Faites l\'inventaire caméra par caméra, avec leur emplacement et les panneaux d\'information.',
            'fichier' => null,
        ],
        [
            'titre' => "Formulaire d'engagement de conformité",
            'categorie' => 'Formulaire complémentaire',
            'articles' => 'art. 405 et 407',
            'contenu' => 'Traitement déjà référencé : extension, réduction, modification ou renouvellement, paramètre par paramètre ; engagement du responsable.',
            'requis' => 'Changement d\'un traitement déjà déclaré ou autorisé, ou renouvellement.',
            'notice' => 'Répondez à chaque « y a-t-il un changement ? » en comparant avec le dossier initial.',
            'fichier' => null,
        ],
        [
            'titre' => "Formulaire pour les métiers de l'image et des médias",
            'categorie' => 'Formulaire principal',
            'articles' => 'art. 397 et 398',
            'contenu' => 'Version simplifiée pour la presse, la radio, la télévision, les photographes, vidéastes et créateurs de contenu (publiée le 3 octobre 2026).',
            'requis' => "Responsable du secteur de l'image ou des médias.",
            'notice' => 'Précisez comment une personne peut demander la dépublication d\'un contenu.',
            'fichier' => null,
        ],
        [
            'titre' => 'Engagement de respect des obligations du DPO',
            'categorie' => 'DPO',
            'articles' => 'art. 430 à 432',
            'contenu' => "Identité du DPO, lettre de désignation, rattachement à la direction, 15 missions, obligations de l'organisme, engagements du DPO.",
            'requis' => "Désignation d'un DPO.",
            'notice' => 'Le DPO ne peut pas être le responsable du traitement ; évitez aussi DSI, DG et DRH (art. 431).',
            'fichier' => null,
        ],
        [
            'titre' => 'Liste des pièces à joindre au formulaire unique',
            'categorie' => 'Autre document',
            'articles' => 'art. 413',
            'contenu' => 'Pièces de base (identité, RCCM, IFU, notice d\'information, preuves de sécurité, modèle de consentement, preuve de formation) et pièces conditionnelles.',
            'requis' => 'Tout dossier.',
            'notice' => "Attention : cette liste inverse la numérotation des annexes transfert et interconnexion. Suivez celle des annexes (3 interconnexion, 4 transfert).",
            'fichier' => null,
        ],
        [
            'titre' => 'Fiche de recensement des entreprises',
            'categorie' => 'Autre document',
            'articles' => 'art. 462 et s.',
            'contenu' => 'Structure, IFU, RCCM, coordonnées, localisation (arrondissement, commune, département), effectifs, informaticien, inventaire des logiciels.',
            'requis' => "Recensement demandé par l'APDP.",
            'notice' => 'Listez tous les logiciels qui traitent des données, y compris les services en ligne.',
            'fichier' => null,
        ],
        [
            'titre' => 'Modèle de lettre de dépôt de plainte',
            'categorie' => 'Autre document',
            'articles' => 'art. 448',
            'contenu' => 'Plaignant, organisme mis en cause, faits, démarches déjà faites, pièces.',
            'requis' => "Plainte d'une personne auprès de l'APDP.",
            'notice' => 'Joignez la preuve de votre demande restée sans réponse auprès de l\'organisme.',
            'fichier' => null,
        ],
    ],

];