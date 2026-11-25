<?php



use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\AccueilController;
use App\Http\Controllers\Site\DiagnosticController;
use App\Http\Controllers\Site\LogicielController;
use App\Http\Controllers\Site\SolutionsController;
use App\Http\Controllers\Site\LivreVController;
use App\Http\Controllers\Site\FormulairesController;
use App\Http\Controllers\Site\TarifsController;
use App\Http\Controllers\Site\ApprendreController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\LegalController;

/*
|--------------------------------------------------------------------------
| Site public dpo.bj (Blade, section 4.1 du cahier des charges)
|--------------------------------------------------------------------------
*/
Route::get('/', AccueilController::class)->name('home');

Route::name('site.')->group(function () {
    Route::get('/diagnostic', [DiagnosticController::class, 'show'])->name('diagnostic');
    Route::post('/diagnostic', [DiagnosticController::class, 'evaluer'])->name('diagnostic.evaluer');
    Route::get('/outil', [LogicielController::class, 'outil'])->name('outil');
    Route::permanentRedirect('/logiciel', '/outil');
    Route::permanentRedirect('/logiciel/mobile', '/outil');
    Route::view('/quiz', 'site.quiz')->name('quiz');
    Route::get('/solutions/secteurs', [SolutionsController::class, 'secteurs'])->name('secteurs');
    Route::get('/services', [SolutionsController::class, 'services'])->name('services');
    Route::get('/livre-v', LivreVController::class)->name('livre-v');
    Route::get('/formulaires', FormulairesController::class)->name('formulaires');
    Route::get('/academie', [ApprendreController::class, 'academie'])->name('academie');
    Route::get('/ressources', [ApprendreController::class, 'ressources'])->name('ressources');
    Route::get('/tarifs', TarifsController::class)->name('tarifs');
    Route::get('/contact', [ContactController::class, 'show'])->name('contact');
    Route::post('/contact', [ContactController::class, 'envoyer'])
    ->middleware('throttle:5,1')
    ->name('contact.envoyer');
    Route::view('/scanner', 'site.page', ['titre' => 'Scanner de site'])->name('scanner');
    Route::get('/mentions-legales', [LegalController::class, 'mentions'])->name('mentions');
    Route::get('/confidentialite', [LegalController::class, 'confidentialite'])->name('confidentialite');
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


