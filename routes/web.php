<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Staff;
use App\Models\Photo;
use App\Models\Product;
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
Route::get('/create',function (){
    $staff= Staff::find(1);
    $staff->photos()->create(['example.jpg']);



});
Route::get('/read',function (){
   $staff= Staff::findorFail(1);
   foreach ($staff->photos as $photo)
   {
       return $photo->path;
   }
});
Route::get('/update',function(){
    $staff=Staff::findorFail(1);
    $photo=$staff->photos()->whereid(1)->first();
     $photo->path='Update example.jpg';
    $photo->save();
});
Route::get('/delete',function (){
    $staff=Staff::findorFail(1);
    $staff->photos()->delete();
});
Route::get('assign',function (){
   $staff=Staff::findorFail(1);
   $photo=Photo::findorFail(3);
   $staff->photos()->save($photo);
});
Route::get('un_assign',function (){
    $staff=Staff::findorFail(1);
    $photo=Photo::findorFail(4);
    $staff->photos()->whereid(4)->update(['imageable_id'=>'','imageable_type'=>'']);

});
