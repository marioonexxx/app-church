<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\BinaUmatController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\FotoGalleryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\IbadahKategorialController;
use App\Http\Controllers\IbadahMingguController;
use App\Http\Controllers\InformasiJemaatController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JemaatUploadController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\PerangkatGerejaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\ShkController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\WartaJemaatController;
use App\Models\Misi;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('homepage.index');
// });



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/sejarah-gereja', [HomepageController::class, 'sejarah'])->name('homepage.sejarah');
Route::get('/visi-misi',[HomepageController::class, 'visimisi'])->name('homepage.visimisi');
Route::get('/struktur-organisasi',[HomepageController::class, 'struktur'])->name('homepage.struktur');
Route::get('/jadwal-minggu',[HomepageController::class, 'jadwalminggu'])->name('homepage.jadwalminggu');
Route::get('/jadwal-kategorial',[HomepageController::class, 'jadwalkategorial'])->name('homepage.jadwalkategorial');
Route::get('/info-warta',[HomepageController::class, 'warta'])->name('homepage.wartajemaat');
Route::get('/santapan-harian-keluarga',[HomepageController::class, 'shk'])->name('homepage.shk');
Route::get('/arsip-dokumen',[HomepageController::class, 'arsip'])->name('homepage.arsip');
Route::get('/bina-umat',[HomepageController::class, 'binaumat'])->name('homepage.binaumat');
Route::get('/info-pengumuman',[HomepageController::class, 'info'])->name('homepage.info');
Route::get('/info-ultah',[HomepageController::class, 'info_ultah'])->name('homepage.info-ultah');
Route::get('/berita-kegiatan',[HomepageController::class, 'blogpost'])->name('homepage.beritakegiatan');
Route::get('/berita-kegiatan/{slug}', [HomepageController::class, 'blogdetail'])->name('homepage.blogdetail');
Route::get('/kontak',[HomepageController::class, 'kontak'])->name('homepage.kontak');
Route::get('/gallery-foto', [HomepageController::class, 'galleryFoto'])->name('homepage.galleryFoto');
Route::get('/gallery-video',[HomepageController::class, 'galleryVideo'])->name('homepage.galleryVideo');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// ROLE ADMINISTRATOR

Route::middleware('auth','verified','Administrator')->group(function(){

    Route::get('/dashboard',[AdministratorController::class, 'dashboard'])->name('dashboard');

    Route::get('/header',[HeaderController::class, 'index'])->name('administrator.header.index');
    Route::post('/header', [HeaderController::class, 'submit'])->name('administrator.header.submit');

    Route::get('/slideshow',[SlideShowController::class, 'index'])->name('administrator.slideshow.index');
    Route::post('/slideshow/store',[SlideShowController::class, 'store'])->name('administrator.slideshow.store');
    Route::put('/slideshow/update/{id}',[SlideShowController::class, 'update'])->name('administrator.slideshow.update');
    Route::delete('/slideshow/delete/{id}',[SlideShowController::class, 'destroy'])->name('administrator.slideshow.destroy');


    Route::get('/visi',[VisiController::class, 'index'])->name('administrator.visi.index');
    Route::post('/visi',[VisiController::class, 'submit'])->name('administrator.visi.submit');

    Route::get('/misi',[MisiController::class, 'index'])->name('administrator.misi.index');
    Route::post('/misi',[MisiController::class, 'submit'])->name('administrator.misi.submit');

    Route::get('/sejarah',[SejarahController::class, 'index'])->name('administrator.sejarah.index');
    Route::post('/sejarah',[SejarahController::class, 'submit'])->name('administrator.sejarah.submit');

    Route::get('/fotogallery',[FotoGalleryController::class, 'index'])->name('administrator.fotogallery.index');
    Route::post('/fotogallery/store',[FotoGalleryController::class, 'store'])->name('administrator.fotogallery.store');
    Route::put('/fotogallery/update/{id}',[FotoGalleryController::class, 'update'])->name('administrator.fotogallery.update');
    Route::delete('/fotogallery/delete/{id}',[FotoGalleryController::class, 'destroy'])->name('administrator.fotogallery.destroy');

    Route::get('/videogallery',[VideoGalleryController::class, 'index'])->name('administrator.videogallery.index');
    Route::post('/videogallery/store',[VideoGalleryController::class, 'store'])->name('administrator.videogallery.store');
    Route::put('/videogallery/update/{id}',[VideoGalleryController::class, 'update'])->name('administrator.videogallery.update');
    Route::delete('/videogallery/delete/{id}',[VideoGalleryController::class, 'destroy'])->name('administrator.videogallery.destroy');


    Route::get('/wartajemaat',[WartaJemaatController::class, 'index'])->name('administrator.wartajemaat.index');
    Route::post('/wartajemaat/store',[WartaJemaatController::class, 'store'])->name('administrator.wartajemaat.store');
    Route::put('/wartajemaat/update/{id}',[WartaJemaatController::class, 'update'])->name('administrator.wartajemaat.update');
    Route::delete('/wartajemaat/delete/{id}',[WartaJemaatController::class, 'destroy'])->name('administrator.wartajemaat.destroy');

    Route::get('/dokumen-arsip',[ArsipController::class, 'index'])->name('administrator.arsip.index');
    Route::post('/dokumen-arsip/store',[ArsipController::class, 'store'])->name('administrator.arsip.store');
    Route::put('/dokumen-arsip/update/{id}',[ArsipController::class, 'update'])->name('administrator.arsip.update');
    Route::delete('/dokumen-arsip/delete/{id}',[ArsipController::class, 'destroy'])->name('administrator.arsip.destroy');



    Route::get('/shk',[ShkController::class, 'index'])->name('administrator.shk.index');
    Route::post('/shk/store',[ShkController::class, 'store'])->name('administrator.shk.store');
    Route::put('/shk/update/{id}',[ShkController::class, 'update'])->name('administrator.shk.update');
    Route::delete('/shk/delete/{id}',[ShkController::class, 'destroy'])->name('administrator.shk.destroy');

    Route::get('/binaumat',[BinaUmatController::class, 'index'])->name('administrator.binaumat.index');
    Route::post('/bina-umat/store',[BinaUmatController::class, 'store'])->name('administrator.binaumat.store');
    Route::put('/bina-umat/update/{id}',[BinaUmatController::class, 'update'])->name('administrator.binaumat.update');
    Route::delete('/bina-umat/delete/{id}',[BinaUmatController::class, 'destroy'])->name('administrator.binaumat.destroy');



    Route::get('/informasijemaat',[InformasiJemaatController::class, 'index'])->name('administrator.informasijemaat.index');
    Route::post('/informasijemaat/store',[InformasiJemaatController::class, 'store'])->name('administrator.informasijemaat.store');
    Route::put('/informasijemaat/update/{id}',[InformasiJemaatController::class, 'update'])->name('administrator.informasijemaat.update');
    Route::delete('/informasijemaat/delete/{id}',[InformasiJemaatController::class, 'destroy'])->name('administrator.informasijemaat.destroy');

    Route::get('/kategori',[KategoriController::class, 'index'])->name('administrator.kategori.index');
    Route::post('/kategori/store',[KategoriController::class, 'store'])->name('administrator.kategori.store');
    Route::put('/kategori/update/{id}',[KategoriController::class, 'update'])->name('administrator.kategori.update');
    Route::delete('/kategori/delete/{id}',[KategoriController::class, 'destroy'])->name('administrator.kategori.destroy');

    Route::get('/blogpost',[BlogPostController::class, 'index'])->name('administrator.blogpost.index');
    Route::post('/blogpost/store',[BlogPostController::class, 'store'])->name('administrator.blogpost.store');
    Route::put('/blogpost/update/{id}',[BlogPostController::class, 'update'])->name('administrator.blogpost.update');
    Route::delete('/blogpost/delete/{id}',[BlogPostController::class, 'destroy'])->name('administrator.blogpost.destroy');

    Route::get('/jabatan',[JabatanController::class, 'index'])->name('administrator.jabatan.index');
    Route::post('/jabatan/store',[JabatanController::class, 'store'])->name('administrator.jabatan.store');
    Route::put('/jabatan/update/{id}',[JabatanController::class, 'update'])->name('administrator.jabatan.update');
    Route::delete('/jabatan/delete/{id}',[JabatanController::class, 'destroy'])->name('administrator.jabatan.destroy');

    Route::get('/perangkat',[PerangkatGerejaController::class, 'index'])->name('administrator.perangkat.index');
    Route::post('/perangkat/store',[PerangkatGerejaController::class, 'store'])->name('administrator.perangkat.store');
    Route::put('/perangkat/update/{id}',[PerangkatGerejaController::class, 'update'])->name('administrator.perangkat.update');
    Route::delete('/perangkat/delete/{id}',[PerangkatGerejaController::class, 'destroy'])->name('administrator.perangkat.destroy');

    Route::get('/jadwal',[IbadahMingguController::class, 'index'])->name('administrator.jadwal.index');
    Route::post('/jadwal',[IbadahMingguController::class, 'submit'])->name('administrator.jadwal.submit');

    Route::get('/jadwal-kebaktian-kategorial',[IbadahKategorialController::class, 'index'])->name('administrator.jadwalkategorial.index');
    Route::post('/jadwal-kebaktian-kategorial/store',[IbadahKategorialController::class, 'store'])->name('administrator.jadwalkategorial.store');
    Route::put('/jadwal-kebaktian-kategorial/update/{id}',[IbadahKategorialController::class, 'update'])->name('administrator.jadwalkategorial.update');
    Route::delete('/jadwal-kebaktian-kategorial/delete/{id}',[IbadahKategorialController::class, 'destroy'])->name('administrator.jadwalkategorial.destroy');
    Route::post('/jadwal-kebaktian-upload',[IbadahKategorialController::class, 'upload'])->name('administrator.jadwalkategorial.upload');
    Route::delete('/jadwal-kebaktian-delete',[IbadahKategorialController::class, 'deleteAll'])->name('administrator.jadwalkategorial.deleteall');
    Route::delete('/jadwalkategorial/delete-by-sektor', [IbadahKategorialController::class, 'deleteBySektor'])->name('administrator.jadwalkategorial.deletesektor');
    Route::get('/get-units/{sektor_id}', [IbadahKategorialController::class, 'getUnitsBySektor'])->name('administrator.jadwalkategorial.listunitbysektor');




    Route::get('/sektor',[SektorController::class, 'index'])->name('administrator.sektor.index');
    Route::post('/sektor',[SektorController::class, 'store'])->name('administrator.sektor.store');
    Route::put('/sektor/{id}',[SektorController::class, 'update'])->name('administrator.sektor.update');
    Route::delete('/sektor/{id}',[SektorController::class, 'destroy'])->name('administrator.sektor.destroy');

    Route::get('/unit',[UnitController::class, 'index'])->name('administrator.unit.index');
    Route::post('/unit',[UnitController::class, 'store'])->name('administrator.unit.store');
    Route::put('/unit/{id}',[UnitController::class, 'update'])->name('administrator.unit.update');
    Route::delete('/unit/{id}',[UnitController::class, 'destroy'])->name('administrator.unit.destroy');

    Route::get('/upload-data-jemaat',[JemaatUploadController::class, 'index'])->name('administrator.upload.files');
    Route::post('/upload-data-jemaat',[JemaatUploadController::class, 'upload'])->name('administrator.upload.submit');
    Route::delete('/jemaat-delete-all', [JemaatUploadController::class, 'destroy_all'])->name('administrator.destroy.alljemaat');
    Route::delete('/jemaat-delete-sektor',[JemaatUploadController::class, 'destroyByUnit'])->name('administrator.destroy.byunit');





});

require __DIR__.'/auth.php';
