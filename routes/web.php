<?php
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\User;
use App\Policies\UserPolicy;
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
Route::get('login',[LoginController::class, 'create'])->name('login');
Route::post('login',[LoginController::class, 'store']);
Route::post('logout',[LoginController::class, 'destroy'])->middleware('auth');
Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return Inertia::render('Home');
    });
    
    Route::get('/users', function () {
        //sleep(2);
        //return User::paginate(10);
        return Inertia::render('Users/Index', [
            //'time' => now()->toTimeString()
            /*'users' => User::all()->map(fn($user)=>[
                'id' => $user->id,
                'name' =>$user->name
            ])*/
            'users'=>User::query()
                ->when(Request::input('search'), function($query, $search){
                    $query->where('name','like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) =>[
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });
    
    Route::get('users/create', function(){
        return Inertia::render('Users/Create');
    });
    //->can('create, App\Models\User');
    //->middleware('can:create,App\Models\User');
    
    Route:: post('/users', function(){
        //validate the request
        //sleep(3);
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
            'pass_con' => 'required',
        ]);
    
        //create the user
        User::create($attributes);
    
        //redirect
        return redirect('/users');
    });
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

    Route::get('/imports', function(){
        return Inertia::render('Imports/Index');
    });
    /*
    Route::post('/logout', function () {
        //return Inertia::render('Settings');
        //dd('logging the user out');
        dd(request('foo'));
    });*/
});

