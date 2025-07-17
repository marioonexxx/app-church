<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class JemaatUploadController extends Controller
{
    public function index()
    {

        $listUnitGabungan = Unit::with('sektor')->get()->map(function ($unit) {
            return [
                'unit' => $unit->nama,
                'sektor' => $unit->sektor->nama,
                'label' => $unit->sektor->nama . ' - ' . $unit->nama,
            ];
        });

        $jemaat = Jemaat::all();
        return view('pages.jemaat.index', compact('jemaat', 'listUnitGabungan'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::toArray([], $request->file('file'));

        // Ambil sheet pertama
        $rows = $data[0];

        foreach ($rows as $index => $row) {
            // Lewati baris header (jika baris pertama)
            if ($index === 0) {
                continue;
            }

            // Cek isi row saat ini
            // dd($row); // <-- Taruh di sini sementara untuk debug

            // Validasi minimum data yang dibutuhkan
            if (count($row) < 8 || empty($row[0])) {
                continue;
            }

            // Tangani tanggal lahir, bisa serial atau string
            $tanggalLahir = null;
            if (!empty($row[4]) && is_numeric($row[4])) {
                try {
                    $tanggalLahir = Date::excelToDateTimeObject($row[4])->format('Y-m-d');
                } catch (\Exception $e) {
                    $tanggalLahir = null;
                }
            }


            // Simpan ke database
            Jemaat::create([
                'nama' => $row[0],
                'nama_kepala_keluarga' => $row[1],
                'status_dalam_keluarga' => $row[2],
                'tempat_lahir' => $row[3],
                'tgl_lahir' => $tanggalLahir,
                'kelamin' => $row[5],
                'sektor' => $row[6],
                'unit' => $row[7],
            ]);
        }

        return back()->with('success', 'Data jemaat berhasil diimport.');
    }

    public function destroy_all()
    {
        Jemaat::truncate(); // Hapus semua data
        return back()->with('success', 'Semua data jemaat berhasil dihapus.');
    }

    public function destroyByUnit(Request $request)
    {
        $value = $request->unit_sektor;
        [$sektor, $unit] = explode('|', $value);

        $deleted = Jemaat::where('sektor', $sektor)
            ->where('unit', $unit)
            ->delete();

        return redirect()->back()->with('success', "Berhasil menghapus {$deleted} jemaat dari Sektor $sektor - Unit $unit.");
    }
}
