<?php



use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\AccueilController;
use App\Http\Controllers\Site\DiagnosticController;
use App\Http\Controllers\Site\LogicielController;
use App\Http\Controllers\Site\SolutionsController;

/*
|--------------------------------------------------------------------------
| Site public dpo.bj (Blade, section 4.1 du cahier des charges)
|--------------------------------------------------------------------------
*/
Route::get('/', AccueilController::class)->name('home');

Route::name('site.')->group(function () {
    Route::get('/diagnostic', [DiagnosticController::class, 'show'])->name('diagnostic');
    Route::post('/diagnostic', [DiagnosticController::class, 'evaluer'])->name('diagnostic.evaluer');
    Route::get('/logiciel', [LogicielController::class, 'web'])->name('logiciel');
    Route::get('/logiciel/mobile', [LogicielController::class, 'mobile'])->name('mobile');
    Route::get('/solutions/secteurs', [SolutionsController::class, 'secteurs'])->name('secteurs');
    Route::get('/services', [SolutionsController::class, 'services'])->name('services');
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


