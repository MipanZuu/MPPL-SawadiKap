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


Route::get('/community',[CommunityController::class, 'index'])->name('community');
Route::get('/community-sunda',[CommunityController::class, 'viewSundaCommunity'])->name('viewSundaCommunity');
Route::get('/community-malay',[CommunityController::class, 'viewMalayCommunity'])->name('viewMalayCommunity');
Route::get('/community-jawa',[CommunityController::class, 'viewJawaCommunity'])->name('viewJawaCommunity');






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

/* Ormawa ROUTES */

Route::get('/ormawa',[OrmawaController::class, 'index'])->name('ormawa');
Route::get('/nilaiormawa/{id}',[OrmawaController::class, 'nilaiOrmawa'])->name('nilaiOrmawa');
Route::get('/nilaiormawa/{id_ormawa}/{id_kegiatan}',[OrmawaController::class, 'tambahNilai'])->name('tambahNilaiOrmawa');
Route::post('/nilaiormawa/post',[OrmawaController::class, 'addNilai'])->name('tambahnilaiormawa.post');
Route::get('/tambahkegiatan', [OrmawaController::class, 'tambahkegiatan'])->name('tambahkegiatan');
Route::get('/ormawa/kegiatan/edit/{id}', [OrmawaController::class, 'editkegiatan'])->name('editkegiatan');
Route::get('/listkegiatan', [OrmawaController::class, 'listkegiatan'])->name('listkegiatan');
Route::get('/tambahkegiatan/post', [OrmawaController::class, 'addKegiatan'])->name('tambahkegiatan.post');
Route::get('/kegiatan/{id}/edit', [OrmawaController::class, 'editKegiatan'])->name('kegiatan.edit');
Route::post('/kegiatan/edit/post', [OrmawaController::class, 'updatekegiatan'])->name('editkegiatan.post');
Route::get('/ormawa/import', [OrmawaController::class, 'fileImportExport'])->name('importOrmawa');
Route::post('/ormawa/import', [OrmawaController::class, 'deleteKegiatan'])->name('kegiatan.delete');
Route::post('/ormawa/import/post', [OrmawaController::class, 'fileImport'])->name('importOrmawa.post');
Route::post('/ormawa/nilai/post', [OrmawaController::class, 'updateNilaiOrmawa'])->name('nilaiOrmawa.post');
Route::get('/ormawa/nilai/edit/{id}', [OrmawaController::class, 'editNilaiOrmawa'])->name('editNilai');
Route::post('/ormawa/nilai/delete', [OrmawaController::class, 'deleteNilaiOrmawa'])->name('nilaiOrmawa.delete');


/* Mahasiswa ROUTES */
Route::get('file-import-export', [MahasiswaController::class, 'fileImportExport'])->name('fileImportExport');
Route::post('file-import', [MahasiswaController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [MahasiswaController::class, 'fileExport'])->name('file-export');
Route::get('/listmahasiswa', [MahasiswaController::class, 'listmahasiswa'])->name('listmahasiswa');

/* Tahap ROUTES */
Route::get('/listtahap', [TahapController::class, 'listtahap'])->name('listtahap');
Route::get('/tambahtahap', [TahapController::class, 'tambahTahap'])->name('tambahtahap');
Route::post('/tambahtahap-post', [TahapController::class, 'addTahap'])->name('tambahtahap.post');
Route::get('/tahap/{id}/edit', [TahapController::class, 'editTahap'])->name('tahap.edit');
Route::post('/tahap/{id}/ubah', [TahapController::class, 'statusTahap'])->name('tahap.ubah');
Route::POST('/tahap/{id}/delete', [TahapController::class, 'deleteTahap'])->name('tahap.delete');
Route::POST('/tahap/update', [TahapController::class, 'updateTahap'])->name('tahap.update');

/* MhsOrmawa ROUTES */
Route::get('/listmhsormawa', [MhsormawaController::class, 'listmhsormawa'])->name('listmhsormawa');
Route::get('/tambahmhsormawa', [MhsormawaController::class, 'tambahmhsormawa'])->name('tambahmhsormawa');
Route::post('/tambahmhsormawa/post', [MhsormawaController::class, 'addMhsormawa'])->name('tambahmhsormawa.post');
Route::get('/mhsormawa/edit/{id}', [MhsormawaController::class, 'editmhsormawa'])->name('editmhsormawa');
Route::post('/mhsormawa/post', [MhsormawaController::class, 'updateMhsormawa'])->name('editmhsormawa.post');
Route::post('/mhsormawa/delete', [MhsormawaController::class, 'deleteMhsormawa'])->name('mhsormawa.delete');
Route::post('/mhsormawa/delete/all', [MhsormawaController::class, 'deleteallmhsormawa'])->name('mhsormawa.deleteall');

/* Panitia ROUTES */
Route::get('/panitia', [PanitiaController::class, 'index'])->name('panitia');
Route::get('/listtahappanitia', [PanitiaController::class, 'listtahappanitia'])->name('listtahappanitia');
Route::get('/nilaipanitia/{id}',[PanitiaController::class, 'nilaiPanitia'])->name('nilaiPanitia');
Route::get('/listkegiatan/panitia', [PanitiaController::class, 'listkegiatanpanitia'])->name('listkegiatan.panitia');
Route::post('/nilaipanitia/post',[PanitiaController::class, 'addNilaiPanitia'])->name('tambahnilaipanitia.post');
Route::get('/nilaipanitia/{id}/edit',[PanitiaController::class, 'editNilaiPanitia'])->name('editNilaiPanitia');
Route::post('/nilaipanitia/edit/post',[PanitiaController::class, 'updateNilaiPanitia'])->name('nilaiPanitia.edit');
Route::get('/panitia/manajemen', [PanitiaController::class, 'manajemenMahasiswaPanitia'])->name('panitia.manage');
Route::get('/panitia/manajemen/{id}', [PanitiaController::class, 'detailTahapPanitia'])->name('panitia.detail');
Route::get('/panitia/manajemen/{id}/pdf', [PanitiaController::class, 'pdfDownload'])->name('panitia.pdf');
Route::get('/panitia/manajemen/{tahap}/{id}', [PanitiaController::class, 'detailMahasiswa'])->name('panitia.detailnilai');

/* Mahasiswa ROUTES */
Route::get('/nilaimahasiswa/',[MahasiswaController::class, 'searchMhs'])->name('mahasiswa.search');
Route::get('/mahasiswa/{tahap}/{id}', [MahasiswaController::class, 'detailMhs'])->name('mahasiswa.detailnilai');
