<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('task', function(){
    $tasks = DB::select('select * from tasks');
    return view( 'tasks', ['tasks' => $tasks] );
});

Route::post('task', function(Request $reqeust){
    $content = $reqeust->input('content');
    DB::insert('insert into tasks (content) values (?)', [$content]);

    return redirect('task');
});

Route::post('task/delete/{id}', function($id){
    DB::delete('delete from tasks where id = ?', [$id]);
    
    return redirect('task');
});