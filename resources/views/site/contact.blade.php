@extends('layouts.site')

@section('title', 'Contact')

@section('content')
    <section class="band">
        <div class="wrap diag">

            <div>
                <h1>Parlons de votre conformité</h1>
                <p class="mut">
                    Démo de 30 minutes, devis d'accompagnement ou question sur Sitael. Support en français
                    aux heures ouvrées de Cotonou, réponse sous 48 h ouvrées ; ligne prioritaire en cas de violation de données.
                </p>

                @if (session('succes'))
                    <p class="succes" role="status">{{ session('succes') }}</p>
                @endif

                @if ($errors->any())
                    <p class="erreur" role="alert">Vérifiez les champs signalés en rouge.</p>
                @endif

                <form method="POST" action="{{ route('site.contact.envoyer') }}" class="card formulaire" novalidate>
                    @csrf

                    {{-- Champ piège anti-robots : ne pas supprimer --}}
                    <div class="piege" aria-hidden="true">
                        <label for="site_web">Ne pas remplir ce champ</label>
                        <input id="site_web" name="site_web" type="text" tabindex="-1" autocomplete="off">
                    </div>

                    <label for="nom">Nom et prénom <span class="obligatoire">*</span></label>
                    <input id="nom" name="nom" value="{{ old('nom') }}" required maxlength="150" autocomplete="name">
                    @error('nom') <p class="champ-erreur">{{ $message }}</p> @enderror

                    <label for="organisation">Organisation <span class="obligatoire">*</span></label>
                    <input id="organisation" name="organisation" value="{{ old('organisation') }}" required maxlength="150" autocomplete="organization">
                    @error('organisation') <p class="champ-erreur">{{ $message }}</p> @enderror

                    <label for="email">E-mail professionnel <span class="obligatoire">*</span></label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required maxlength="190" autocomplete="email">
                    @error('email') <p class="champ-erreur">{{ $message }}</p> @enderror

                    <label for="telephone">Téléphone ou WhatsApp <span class="mut small">(facultatif)</span></label>
                    <input id="telephone" name="telephone" type="tel" value="{{ old('telephone') }}" placeholder="01 97 00 00 00" autocomplete="tel">
                    @error('telephone') <p class="champ-erreur">{{ $message }}</p> @enderror

                    <label for="objet">Objet <span class="obligatoire">*</span></label>
                    <select id="objet" name="objet" required>
                        @foreach ($objets as $cle => $libelle)
                            <option value="{{ $cle }}" @selected(old('objet', 'demo') === $cle)>{{ $libelle }}</option>
                        @endforeach
                    </select>
                    @error('objet') <p class="champ-erreur">{{ $message }}</p> @enderror

                    <label for="message">Message <span class="mut small">(facultatif)</span></label>
                    <textarea id="message" name="message" rows="5" maxlength="3000">{{ old('message') }}</textarea>
                    @error('message') <p class="champ-erreur">{{ $message }}</p> @enderror

                    {{-- Consentement : facultatif, NON coché par défaut (art. 390) --}}
                    <label class="case">
                        <input type="checkbox" name="consentement" value="1" @checked(old('consentement'))>
                        <span>{{ $texteConsentement }}</span>
                    </label>

                    <button class="btn hot" type="submit" style="margin-top:16px">Envoyer</button>
                    <p class="small mut" style="margin-top:8px"><span class="obligatoire">*</span> Champs obligatoires</p>
                </form>

                {{-- Mentions d'information (art. 415) --}}
                <div class="mentions small mut">
                    <p><b>Vos données</b></p>
                    <p>
                        <b>Responsable du traitement :</b> dpo.bj.
                        <b>Finalité :</b> répondre à votre demande et, si vous l'acceptez, vous envoyer des informations commerciales.
                        <b>Base légale :</b> votre demande pour la réponse ; votre consentement pour la prospection.
                        <b>Destinataires :</b> l'équipe de dpo.bj uniquement.
                        <b>Conservation :</b> {{ $conservation }} ans après la réception de votre demande, puis suppression automatique.
                    </p>
                    <p>
                        Vous pouvez exercer vos droits d'accès, de rectification, d'opposition et d'effacement, et retirer
                        votre consentement à tout moment, en écrivant à <a href="mailto:dpo@dpo.bj">dpo@dpo.bj</a>.
                        Vous pouvez aussi adresser une réclamation à l'APDP (art. 448).
                        <a href="{{ route('site.confidentialite') }}">Politique de confidentialité</a>.
                    </p>
                </div>
            </div>

            <aside class="card sticky">
                <h3>Nous joindre</h3>
                <p>
                    <b>E-mail</b><br><a href="mailto:contact@dpo.bj">contact@dpo.bj</a><br><br>
                    <b>Téléphone et WhatsApp</b><br><x-a-completer :valeur="config('editeur.telephone')" /><br><br>
                    <b>Adresse</b><br><x-a-completer :valeur="config('editeur.siege')" />
                </p>
                <p class="small mut">
                    Une violation de données en cours ? Précisez-le dans l'objet « Autre » : votre demande sera traitée en priorité.
                </p>
            </aside>

        </div>
    </section>
@endsection