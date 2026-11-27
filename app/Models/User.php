<?php

namespace App\Models;

use App\Concerns\HasTeams;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Support\Facades\Password;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $role_plateforme
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Team|null $currentTeam
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read Collection<int, Membership> $teamMemberships
 * @property-read Collection<int, Team> $teams
 */
#[Fillable(['name', 'email', 'password', 'current_team_id'])]
#[Hidden(['password', 'two_factor_secret', 'two_factor_recovery_codes', 'remember_token'])]
class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasTeams, Notifiable, TwoFactorAuthenticatable;

    /** Rôles de l'équipe dpo.bj autorisés dans le back-office. */
    public const ROLES_BACK_OFFICE = ['admin', 'formateur'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    /** Seule l'équipe dpo.bj, avec un e-mail vérifié, entre dans le back-office (/admin). */
    public function canAccessPanel(Panel $panel): bool
    {
        return in_array($this->role_plateforme, self::ROLES_BACK_OFFICE, true)
            && $this->hasVerifiedEmail();
    }

    /** L'utilisateur est-il administrateur de dpo.bj ? */
    public function estAdmin(): bool
    {
        return $this->role_plateforme === 'admin';
    }

        /** Sessions animées par ce formateur. */
    public function sessionsAnimees(): HasMany
    {
        return $this->hasMany(FormationSession::class, 'formateur_id');
    }
        /**
     * Crée le jeton secret d'un lien « choisir son mot de passe »
     * (même mécanisme que « mot de passe oublié »).
     */
    public function creerJetonMotDePasse(): string
    {
        /** @var PasswordBroker $broker */
        $broker = Password::broker();

        return $broker->createToken($this);
    }
}