<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaiementController;




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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });

// route de la page home
Route::get('/home',[App\Http\Controllers\HomeController::class,'login'])->name('home');

//modifier les info de l utilisateur:
  Route::get('/utilisateur/modifier', [HomeController::class,'modifier'])->name('utilisateur.modifier');
  Route::put('/utilisateur/mettreAjour', [HomeController::class, 'mettreAJour'])->name('utilisateur.mettreAJour');


//la page category
Route::get('/category',[App\Http\Controllers\HomeController::class,'categoryfct']);

//la page de chaque categorie:
Route::get('/category/{slug}',[App\Http\Controllers\HomeController::class,'viewcategory']);


//la route pour la recherche:
route::get('list-produit',[HomeController::class,'listprod']);
route::post('searchproduct',[HomeController::class,'searchproduct']);

//route lors du clique sur chaque produit:
Route::get('category/{category_slug}/{prod_slug}',[App\Http\Controllers\HomeController::class,'viewproduct']);

Route::get('produits/{prod_slug}',[App\Http\Controllers\HomeController::class,'homeProduct']);



//la route lors de clique sur ajouter au panier
Route::post('ajouter-au-panier',[CartController::class,'addProduct']);
//panier
route::middleware(['auth'])->group(function(){
  route::get('/panier',[CartController::class,'viewcart']);
  route::get('/acheter',[CheckoutController::class,'index']);
  // pour voir les commandes de l'utilisateur
  route::get('mes-commandes',[UserController::class,'index']);
  route::get('voir-commande/{id}',[UserController::class,'view']);

  //page paiement stripe 
Route::post('/pay', [CheckoutController::class, 'pay'])->name('pay');

//page facture
Route::get('/facture/{id}', [CheckoutController::class, 'show'])->name('facture');

Route::get('/success', [CheckoutController::class,'succes'])->name('success');

Route::get('/cancel', function () {
 return('une erreur s\'est produit');
})->name('cancel');

});

//lors du clique sur supprimer element du panier
route::post('delete-cart-item', [CartController::class,'deleteprod']);

//route du total panier 
route::post('update-cart',[CartController::class, 'updateCart']);

//route pour poursuivre l'achat:
route::post('commander',[CheckoutController::class,'commander']);



// page promo
route::get('/promotion',[HomeController::class, 'promo']);

// page nouveaux produits
route::get('/nouveauté',[HomeController::class, 'NewProducts']);





Auth::routes();
// route pour l'utilisateur normal 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route pour l'admin
Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//partie admin :

#####
Route::middleware(['auth','is_admin'])->group(function(){



  Route::get('dashboard', [App\Http\Controllers\Admin\dashboardController::class, 'index'])->name('adminhome');
  Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
  Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('add');
  Route::post('insert-category', [App\Http\Controllers\Admin\CategoryController::class, 'insert'])->name('insert');
  Route::get('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
  Route::put('update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
  Route::get('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('delete');
  Route::get('prod-categ/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'afficher']);
  
  
  Route::get('products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
  Route::get('add-product', [App\Http\Controllers\Admin\ProductController::class, 'add'])->name('add');
  Route::post('insert-product', [App\Http\Controllers\Admin\ProductController::class, 'insert'])->name('insert');
  Route::get('edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
  Route::put('update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
  Route::get('delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('delete');
  Route::get('products/{id}/show-clients', [App\Http\Controllers\Admin\ProductController::class, 'showClients'])->name('products.showClients');
  Route::get('prod-repture', [App\Http\Controllers\Admin\ProductController::class, 'qtylimite'])->name('products.showClients');
  Route::get('prod-search', [App\Http\Controllers\Admin\ProductController::class, 'searchProduct'])->name('product.search');
  Route::get('prod-filter/{id}', [App\Http\Controllers\Admin\ProductController::class, 'filter'])->name('products.filter');
  
  Route::get('users', [App\Http\Controllers\Admin\FrontendController::class, 'delete']);
  
  Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
  Route::get('admin/view-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'view'])->name('view');
  Route::get('admin/valider-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'validateOrder']);
  Route::get('admin/annuler-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'cancelValidation']);
  
  Route::get('clients', [App\Http\Controllers\Admin\ClientController::class, 'index']);
  Route::get('view-client-order/{id}', [App\Http\Controllers\Admin\ClientController::class, 'view']);
  Route::get('add-admin', [App\Http\Controllers\Admin\ClientController::class, 'create']);
  Route::post('insert-admin', [App\Http\Controllers\Admin\ClientController::class, 'store']);
  
  Route::get('users', [App\Http\Controllers\Admin\DashboardController::class, 'users']);
  Route::get('view-user/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'view']);
  
  Route::get('profile/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'profile']);
  Route::post('update', [App\Http\Controllers\Admin\DashboardController::class, 'update']);
  Route::post('update-password', [App\Http\Controllers\Admin\DashboardController::class, 'updatePassword']);
  Route::get('settings/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'settings']);
  
  //dashboard links
  Route::get('today-orders', [App\Http\Controllers\Admin\DashboardController::class, 'today']);
  Route::get('month-orders', [App\Http\Controllers\Admin\DashboardController::class, 'month']);
  Route::get('lastmonth-orders', [App\Http\Controllers\Admin\DashboardController::class, 'lastmonth']);
  Route::get('admin123', [App\Http\Controllers\Admin\DashboardController::class, 'admin']);
  
  });
  