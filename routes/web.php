<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\TahapController;
use App\Http\Controllers\MhsormawaController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Request;
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

Route::get('/',[HomeController::class, 'landing'])->name('landing');
Route::get('/signup',[HomeController::class, 'signupPage'])->name('signupPage');
Route::post('/signup-post', [HomeController::class, 'signupUser'])->name('signupUser.post');
Route::get('/petunjuk',[HomeController::class, 'petunjuk'])->name('petunjuk');
Route::get('/tambahmahasiswa', [AdminController::class, 'tambahMahasiswa'])->name('tambahmahasiswa');
Route::post('/tambahmahasiswa/add', [AdminController::class, 'addMahasiswa'])->name('tambahmahasiswa.post');
Route::get('/mahasiswa/{id}/edit', [AdminController::class, 'editMahasiswa'])->name('mahasiswa.edit');
Route::post('/mahasiswa/update', [AdminController::class, 'updateMahasiswa'])->name('mahasiswa.update');
Route::post('/mahasiswa/{id}/delete', [AdminController::class, 'deleteMahasiswa'])->name('mahasiswa.delete');

/* ADMIN ROUTES */
Route::get('/login',[AdminController::class, 'loginpage'])->name('login');
Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::get('/admin-malay',[AdminController::class, 'viewMalayAdmin'])->name('viewmalayadmin');
Route::get('/admin-jawa',[AdminController::class, 'viewJavaAdmin'])->name('viewJavaAdmin');
Route::get('/profile',[AdminController::class, 'viewProfile'])->name('viewProfile');
Route::get('/addpostingadmin',[AdminController::class, 'addposting'])->name('addpostingadmin');
Route::post('/addpostingadmin/add', [ArticleController::class, 'add_process_admin'])->name('addpostingadmin.post');
Route::get('/admin-manage-post',[AdminController::class, 'adminManagePost'])->name('admin-manage-post');

Route::get('/admin-edit-post/{id}',[AdminController::class, 'adminEditPost'])->name('admin-edit-post');
Route::post('/admin-edit-post/update', [ArticleController::class, 'edit_process_admin'])->name('editpostingadmin.post');
Route::post('/admin-manage-post/{id}/delete', [AdminController::class, 'deletePost'])->name('posting.delete');
Route::get('/posting/{id}',[ArticleController::class, 'getArticle'])->name('getArticleDetails');
Route::get('/admin-sunda',[AdminController::class, 'viewSundaAdmin'])->name('viewSundaAdmin');
Route::get('/requestedtopics',[AdminController::class, 'RequestedTopics'])->name('RequestedTopics');

// Route::get('/admin-manage-post/{lang}',[ArticleController::class, 'getLanguage'])->name('getLanguage');


Route::get('/community',[CommunityController::class, 'index'])->name('community');
Route::get('/community-sunda',[CommunityController::class, 'viewSundaCommunity'])->name('viewSundaCommunity');
Route::get('/community-malay',[CommunityController::class, 'viewMalayCommunity'])->name('viewMalayCommunity');
Route::get('/community-jawa',[CommunityController::class, 'viewJawaCommunity'])->name('viewJawaCommunity');
Route::get('/addtopiccommunity',[CommunityController::class, 'addTopicCommunity'])->name('addTopicCommunity');
Route::post('/addtopiccommunity',[CommunityController::class, 'addTopic'])->name('addTopicCommunity');





Route::get('/petunjuk/upload',[AdminController::class, 'uploadpetunjuk'])->name('uploadpetunjuk');
Route::post('/petunjuk/upload/post',[AdminController::class, 'upload'])->name('petunjuk.post');
Route::post('/loginUser',[AdminController::class, 'login'])->name('login.post');

Route::post('/logout',[AdminController::class, 'logout'])->name('logout.post');
Route::get('/listUser', [AdminController::class, 'listUser'])->name('listUser');
Route::get('/tambahUser', [AdminController::class, 'tambahUser'])->name('tambahUser');
Route::post('/tambahUser-post', [AdminController::class, 'addUser'])->name('tambahUser.post');
Route::get('/user/{id}/edit', [AdminController::class, 'getUser'])->name('getUser');
Route::get('/user/update', [AdminController::class, 'userUpdate'])->name('user.update');
Route::post('/user/{user_id}/delete', [AdminController::class, 'destroy'])->name('deleteUser');
Route::get('/listormawa', [AdminController::class, 'listormawa'])->name('listormawa');
Route::get('/manajemenkegiatan', [AdminController::class, 'listormawa'])->name('listormawa');
Route::get('/tambahormawa', [AdminController::class, 'tambahormawa'])->name('tambahormawa');
Route::post('/tambahormawa/add', [AdminController::class, 'addOrmawa'])->name('tambahormawa.post');
Route::get('/ormawa/{id}/edit', [AdminController::class, 'editOrmawa'])->name('ormawa.edit');
Route::post('/ormawa/update', [AdminController::class, 'updateOrmawa'])->name('ormawa.update');
Route::post('/ormawa/{id}/delete/post', [AdminController::class, 'deleteOrmawa'])->name('ormawa.delete');
Route::get('/listpanitia', [AdminController::class, 'listpanitia'])->name('listpanitia');
Route::get('/tambahpanitia', [AdminController::class, 'tambahpanitia'])->name('tambahpanitia');
Route::post('/tambahpanitia/add', [AdminController::class, 'addPanitia'])->name('tambahpanitia.post');
Route::get('/panitia/{id}/edit', [AdminController::class, 'editpanitia'])->name('panitia.edit');
Route::post('/panitia/update', [AdminController::class, 'updatepanitia'])->name('panitia.update');
Route::post('/panitia/{id}/delete', [AdminController::class, 'deletePanitia'])->name('panitia.delete');
Route::get('/listdivisi', [AdminController::class, 'listdivisi'])->name('listdivisi');
Route::get('/tambahdivisi', [AdminController::class, 'tambahdivisi'])->name('tambahdivisi');
Route::post('/tambahdivisi/add', [AdminController::class, 'adddivisi'])->name('tambahdivisi.post');
Route::get('/divisi/{id}/edit', [AdminController::class, 'editdivisi'])->name('divisi.edit');
Route::post('/divisi/update', [AdminController::class, 'updatedivisi'])->name('divisi.update');
Route::post('/divisi/{id}/delete', [AdminController::class, 'deletedivisi'])->name('divisi.delete');
Route::get('/listkegiatanpanitia', [AdminController::class, 'listkegiatanpanitia'])->name('listkegiatanpanitia');
Route::get('/tambahkegiatanpanitia', [AdminController::class, 'tambahkegiatanpanitia'])->name('tambahkegiatanpanitia');
Route::post('/tambahkegiatanpanitia/add', [AdminController::class, 'addkegiatanpanitia'])->name('tambahkegiatanpanitia.post');
Route::get('/kegiatanpanitia/{id}/edit', [AdminController::class, 'editkegiatanpanitia'])->name('kegiatanpanitia.edit');
Route::post('/kegiatanpanitia/update', [AdminController::class, 'updatekegiatanpanitia'])->name('kegiatanpanitia.update');
Route::post('/kegiatanpanitia/{id}/delete', [AdminController::class, 'deletekegiatanpanitia'])->name('kegiatanpanitia.delete');
Route::post('/backup',[AdminController::class, 'backup'])->name('backup');
Route::get('/reset', [AdminController::class, 'reset'])->name('reset');
Route::post('/reset/purge',[AdminController::class, 'deleteAll'])->name('purge');
