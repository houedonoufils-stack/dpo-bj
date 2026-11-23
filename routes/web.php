<?php



use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Site public dpo.bj (Blade, section 4.1 du cahier des charges)
|--------------------------------------------------------------------------
*/
Route::view('/', 'site.accueil')->name('home');

Route::name('site.')->group(function () {
    Route::view('/diagnostic', 'site.page', ['titre' => 'Diagnostic gratuit'])->name('diagnostic');
    Route::view('/logiciel', 'site.page', ['titre' => 'Sitael web'])->name('logiciel');
    Route::view('/logiciel/mobile', 'site.page', ['titre' => 'Sitael mobile'])->name('mobile');
    Route::view('/solutions/secteurs', 'site.page', ['titre' => 'Solutions par secteur'])->name('secteurs');
    Route::view('/services', 'site.page', ['titre' => "Services d'accompagnement"])->name('services');
    Route::view('/livre-v', 'site.page', ['titre' => 'Comprendre le Livre V'])->name('livre-v');
    Route::view('/formulaires', 'site.page', ['titre' => 'Formulaires APDP'])->name('formulaires');
    Route::view('/ressources', 'site.page', ['titre' => 'Ressources et blog'])->name('ressources');
    Route::view('/academie', 'site.page', ['titre' => 'Académie'])->name('academie');
    Route::view('/tarifs', 'site.page', ['titre' => 'Tarifs'])->name('tarifs');
    Route::view('/contact', 'site.page', ['titre' => 'Contact'])->name('contact');
    Route::view('/scanner', 'site.page', ['titre' => 'Scanner de site'])->name('scanner');
    Route::view('/mentions-legales', 'site.page', ['titre' => 'Mentions légales'])->name('mentions');
    Route::view('/confidentialite', 'site.page', ['titre' => 'Politique de confidentialité'])->name('confidentialite');
});

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::post('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
    Route::delete('invitations/{invitation}', [TeamInvitationController::class, 'decline'])->name('invitations.decline');
});

require __DIR__.'/settings.php';


