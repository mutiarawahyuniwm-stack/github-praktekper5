<?php 
namespace App\Http\Controllers; 

use App\Imports\MahasiswaImport; 
use App\Jobs\ImportMahasiswaJob; 
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Facades\Excel; 

class MahasiswaImportController extends Controller 
{ 
    /** 

     * Menampilkan halaman import. 

     */ 

    public function create() 
    { 
        return view('mahasiswa.import'); 
    } 

    /** 

     * Memproses file Excel. 

     */ 
    public function store(Request $request) 
    { 
        // Validasi file 

        $request->validate( 
            [ 
                'file' => [ 
                    'required', 
                    'file', 
                    'mimes:xlsx,xls', 
                    'max:10240', 
                ], 
            ], 
            [ 
                'file.required' => 'File Excel wajib dipilih.', 
                'file.file' => 'File yang diupload tidak valid.',
                'file.mimes' => 'File harus berformat XLS atau XLSX.', 
                'file.max' => 'Ukuran file maksimal 10 MB.', 

            ] 
        ); 
        /* 
         * Simpan file terlebih dahulu. 
         */ 
        $path = $request->file('file')->store('imports'); 
        /* 
         * Masukkan Job ke Redis Queue. 
         */
        ImportMahasiswaJob::dispatch($path); 
        /* 
         * Response langsung diberikan 
         * kepada user. 
         */ 

        // Proses import 
        Excel::import( 
            new MahasiswaImport, 
            $request->file('file') 
        ); 

        return redirect() 
            ->route('mahasiswa.import') 
            ->with( 
                'success', 
                'Data mahasiswa berhasil diimport.' 
            ); 
    } 
} 