<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Binaumat;
use App\Models\Blogpost;
use App\Models\Fotogallery;
use App\Models\Header;
use App\Models\IbadahKategorial;
use App\Models\IbadahMinggu;
use App\Models\Imageslider;
use App\Models\Informasijemaat;
use App\Models\Jemaat;
use App\Models\Misi;
use App\Models\PerangkatGereja;
use App\Models\Sejarah;
use App\Models\Shk;
use App\Models\Videogallery;
use App\Models\Visi;
use App\Models\Wartajemaat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {

        $pengumuman = Informasijemaat::limit(2)->get();
        $wartaJemaat = Wartajemaat::limit(4)->get();
        $slideShow = Imageslider::all();
        // $header = Header::first();
        $blogPost = Blogpost::limit(8)->get();
        $perangkat = PerangkatGereja::limit(4)->get();
        $kebaktianMinggu = IbadahMinggu::first();


        $todayIbadah = Carbon::today();
        $oneWeekLater = Carbon::today()->addDays(7);

        $kebaktianKategorial = IbadahKategorial::whereBetween('waktu', [$todayIbadah, $oneWeekLater])
            ->orderBy('waktu', 'asc')
            ->limit(10)
            ->get();

        //foto gallery

        $fotoGallery = Fotogallery::limit(4)->get();

        //jumlah jemaat
        $totalJemaat = Jemaat::count();
        //jumlah pria
        $totalPria =  Jemaat::where('kelamin', 'L')->count();
        $totalWanita =  Jemaat::where('kelamin', 'P')->count();
        //jumlah kk
        $totalKK = Jemaat::where('status_dalam_keluarga', 'kepala keluarga')->count();

        // $jumlahKK = Jemaat::select('nama_kepala_keluarga')
        //     ->groupBy('nama_kepala_keluarga')
        //     ->count();


        // ultah jemaat
        $today = Carbon::today();
        $endDate = Carbon::today()->addDays(2);

        $ultahJemaat = DB::table('jemaat')
            ->whereRaw("DATE_FORMAT(tgl_lahir, '%m-%d') BETWEEN ? AND ?", [
                $today->format('m-d'),
                $endDate->format('m-d'),
            ])
            ->get();

        // dd($ultahJemaat);

        return view('pages.homepage.index', compact('slideShow', 'fotoGallery', 'totalKK', 'totalPria', 'totalWanita', 'totalJemaat', 'ultahJemaat', 'wartaJemaat', 'pengumuman', 'blogPost', 'perangkat', 'kebaktianMinggu', 'kebaktianKategorial'));
    }

    public function sejarah()
    {
        $sejarah = Sejarah::first();
        return view('pages.homepage.sejarah', compact('sejarah'));
    }

    public function visimisi()
    {
        $visi = Visi::first();
        $misi = Misi::first();
        return view('pages.homepage.visimisi', compact('visi', 'misi'));
    }

    public function struktur()
    {
        $perangkat = PerangkatGereja::all();
        return view('pages.homepage.struktur_organisasi', compact('perangkat'));
    }

    public function jadwalminggu()
    {
        $jadwalminggu = IbadahMinggu::first();
        return view('pages.homepage.ibadahminggu', compact('jadwalminggu'));
    }

    public function jadwalkategorial()
    {
        $ibadahKategorial = IbadahKategorial::all();
        return view('pages.homepage.ibadahkategorial', compact('ibadahKategorial'));
    }

    public function warta()
    {
        $wartaJemaat = Wartajemaat::limit(10)->get();
        return view('pages.homepage.wartajemaat', compact('wartaJemaat'));
    }

    public function info()
    {
        $Informasi = Informasijemaat::limit(10)->get();
        return view('pages.homepage.informasi', compact('Informasi'));
    }

    public function info_ultah()
    {
        // ultah jemaat
        $today = Carbon::today();
        $endDate = Carbon::today()->addDays(2);

        $ultahJemaat = DB::table('jemaat')
            ->whereRaw("DATE_FORMAT(tgl_lahir, '%m-%d') BETWEEN ? AND ?", [
                $today->format('m-d'),
                $endDate->format('m-d'),
            ])
            ->get();

        return view('pages.homepage.informasi-ultah', compact('ultahJemaat'));
    }
    public function shk()
    {
        $shk = Shk::limit(12)->get();
        return view('pages.homepage.shk', compact('shk'));
    }

    public function arsip()
    {
        $arsip = Arsip::all();
        return view('pages.homepage.arsip-dokumen', compact('arsip'));
    }

    public function binaumat()
    {
        $binaumat = Binaumat::limit(12)->get();
        return view('pages.homepage.binaumat', compact('binaumat'));
    }



    public function blogpost()
    {
        $blogPost = Blogpost::limit(20)->get();
        return view('pages.homepage.beritakegiatan', compact('blogPost'));
    }

    public function blogdetail($slug)
    {
        $post = Blogpost::where('slug', $slug)->firstOrFail();
        return view('pages.homepage.berita-kegiatan-detail', compact('post'));
    }

    public function kontak()
    {
        return view('pages.homepage.kontak');
    }

    public function galleryFoto()
    {
        $fotoGallery = Fotogallery::latest()->limit(20)->get();
        return view('pages.homepage.gallery-foto', compact('fotoGallery'));
    }

    public function galleryVideo()
    {
        $videoGallery = Videogallery::latest()->limit(20)->get();
        return view('pages.homepage.gallery-video', compact('videoGallery'));
    }
}
