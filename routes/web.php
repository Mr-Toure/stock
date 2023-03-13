<?php

use App\Models\Bonreception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BesoinController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\TypefourController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\FournitureController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\SsdirectionController;
use App\Http\Controllers\BonlivraisonController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*expression de besoin*/

/* Route::get('/connexion', function () {
    return view('besoin.auth');
})->name('connexion');
 */
Route::get('/connexion', [BesoinController::class, 'connexion'])->name('besoins.auth');
Route::post('/connexion', [BesoinController::class, 'verify'])->name('besoins.verify');
Route::post('/send', [BesoinController::class, 'send'])->name('besoins.send');
Route::get('/besoin/home', [BesoinController::class, 'home'])->name('besoins.home');
Route::get('/besoin/validated', [BesoinController::class, 'validated'])->name('besoins.validated');
Route::get('/besoin/current', [BesoinController::class, 'current'])->name('besoins.current');
Route::get('/besoin/history', [BesoinController::class, 'history'])->name('besoins.history');
Route::get('/besoin/accepted/{id}', [BesoinController::class, 'accepted'])->name('besoins.accepted');
Route::get('/besoin/canceled/{id}', [BesoinController::class, 'canceled'])->name('besoins.canceled');
Route::get('/besoin/await/{id}', [BesoinController::class, 'await'])->name('besoins.await');
Route::get('/besoin/logout', [BesoinController::class, 'out'])->name('besoins.logout');

Route::resource('besoin', BesoinController::class);
/*fin expression besoin*/

//Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('dashboard');


/*Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard'); */

/* Route::controller(Bonreception::class)->group(function () {
    Route::get('/demandes', 'encres')->name('fournitures.encres');
    //Route::get('/famille/{family}', 'show')->name('family.show');
}); */

Route::middleware('auth')->group(function () {

    //profile
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'agents' => AgentController::class,
        'services' => ServiceController::class,
        'ssdirections' => SsdirectionController::class,
        'directions' => DirectionController::class,
        'fournisseurs' => FournisseurController::class,
        'typefours' => TypefourController::class,
        'familles' => FamilleController::class,
        'printers' =>PrinterController::class,
        'fournitures' =>FournitureController::class,
        'commandes' =>CommandeController::class,
        'bonlivraisons' =>BonlivraisonController::class,
    ]);

    Route::controller(CommandeController::class)->group(function () {
        Route::get('/passer_commande', 'create')->name('commandes.create');
        Route::get('/livraison/{commande}', 'livraison')->name('commandes.livraison');
        //Route::get('/famille/{family}', 'show')->name('family.show');
    });

    Route::controller(FournitureController::class)->group(function () {
        Route::get('/encres', 'encres')->name('fournitures.encres');
        //Route::get('/famille/{family}', 'show')->name('family.show');
    });

    //pdf
    Route::get('besoins/pdf/{id}', [BesoinController::class, 'generated_pdf'])->name('besoins.pdf');
    Route::put('/sended/{id}', [BesoinController::class, 'sended'])->name('besoins.sender');

    //Approbation
    Route::get('/besoins/approbation', [BesoinController::class, 'approbation'])->name('besoins.approbation');
    Route::get('/besoins/terminated/{id}', [BesoinController::class, 'terminated'])->name('besoins.terminated');

});

require __DIR__.'/auth.php';
