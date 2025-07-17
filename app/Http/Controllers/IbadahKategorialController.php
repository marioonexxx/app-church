<?php

namespace App\Http\Controllers;

use App\Models\IbadahKategorial;
use App\Models\Sektor;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class IbadahKategorialController extends Controller
{
    public function index()
    {
        $dataSektor = Sektor::orderBy('nama')->get();
        $dataUnit = Unit::orderBy('nama')->get();
        $ibadahKategorial = IbadahKategorial::all();
        return view('pages.ibadahkategorial.index', compact('ibadahKategorial', 'dataSektor', 'dataUnit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'waktu' => 'required|date',
            'jam' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'pemimpin' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'unit_combined' => 'required|string', // karena gabungan sektor|unit
        ]);

        // Pisahkan sektor dan unit dari nilai gabungan
        [$sektorNama, $unitNama] = explode('|', $request->unit_combined);

        // Simpan ke database
        IbadahKategorial::create([
            'nama' => $request->nama,
            'waktu' => $request->waktu,
            'jam' => $request->jam,
            'tempat' => $request->tempat,
            'pemimpin' => $request->pemimpin,
            'kategori' => $request->kategori,
            'sektor' => $sektorNama,
            'unit' => $unitNama,
        ]);

        return back()->with('success', 'Jadwal berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'waktu' => 'required|date',
            'jam' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'pemimpin' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'unit_combined' => 'required|string',
        ]);

        // Pisahkan nilai sektor dan unit
        [$sektorNama, $unitNama] = explode('|', $request->unit_combined);

        // Update data
        IbadahKategorial::where('id', $id)->update([
            'nama' => $request->nama,
            'waktu' => $request->waktu,
            'jam' => $request->jam,
            'tempat' => $request->tempat,
            'pemimpin' => $request->pemimpin,
            'kategori' => $request->kategori,
            'sektor' => $sektorNama,
            'unit' => $unitNama,
        ]);

        return back()->with('success', 'Jadwal berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $ibadahKategorial = IbadahKategorial::findOrFail($id);
        $ibadahKategorial->delete();
        return back()->with('success', 'Jadwal berhasil dihapus.');
    }

    public function deleteBySektor(Request $request)
    {
        $request->validate([
            'sektor' => 'required|string',
        ]);

        $deleted = IbadahKategorial::where('sektor', $request->sektor)->delete();

        return redirect()->back()->with('success', "Berhasil menghapus data kebaktian berdasarkan sektor.");
    }


    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        $data = Excel::toArray([], $request->file('file'));

        if (empty($data) || empty($data[0])) {
            return back()->with('error', 'File Excel kosong atau tidak terbaca.');
        }

        $rows = $data[0];
        $berhasil = 0;
        $gagal = 0;

        foreach ($rows as $index => $row) {
            if ($index === 0) continue; // Skip header

            // Validasi semua kolom wajib
            if (count($row) < 6 || empty($row[0]) || empty($row[1]) || empty($row[2]) || empty($row[3]) || empty($row[4]) || empty($row[5])) {
                $gagal++;
                continue;
            }

            try {
                // Konversi kolom waktu (tanggal)
                $waktu = null;
                if (is_numeric($row[1])) {
                    $waktu = Date::excelToDateTimeObject($row[1])->format('Y-m-d');
                } else {
                    $waktu = date('Y-m-d', strtotime($row[1]));
                }

                // Kolom jam: simpan apa adanya (pastikan format string jam di Excel valid)
                $jam = $row[2];

                IbadahKategorial::create([
                    'nama' => $row[0],
                    'waktu' => $waktu,
                    'jam' => $jam,
                    'tempat' => $row[3],
                    'pemimpin' => $row[4],
                    'kategori' => $row[5],
                    'sektor' => $row[6],
                    'unit' => $row[7],
                ]);
                $berhasil++;
            } catch (\Exception $e) {
                // Jika mau debug: Log::error($e->getMessage());
                $gagal++;
                continue;
            }
        }

        if ($berhasil == 0) {
            return back()->with('error', 'Gagal mengunggah data. Silakan periksa kembali format file Excel Anda.');
        }

        return back()->with('success', "$berhasil data berhasil diupload. $gagal gagal.");
    }

    public function deleteAll()
    {
        IbadahKategorial::truncate(); // Hapus semua data
        return back()->with('success', 'Semua data berhasil dihapus.');
    }
}
