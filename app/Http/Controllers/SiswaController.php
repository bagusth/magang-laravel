<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Siswa;

class SiswaController extends Controller{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
	{
		$data['siswa'] = \App\Siswa::orderBy('nim')->paginate(10);
        $data['jurusan'] = \App\Jurusan::orderBy('kode_jur')->get();
        return view('siswa.data-siswa', $data);
    }

    public function store(Request $request )
    {
        // Validasi Terlebih Dahulu Apakah Ada Field Yang Kosong
       $this->validate($request,[
        'nim' => 'required',
        'nama' => 'required',
        'kode_jur' => 'required'
    ]);
        $kode_lokasi = null;
        // Insert Data Ke Database Dengan Model Siswa
        $status = Siswa::create([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'kode_lokasi' => $request->kode_lokasi,
        'kode_jur' => $request->kode_jur
    ]);
        // Redirect Ke Halaman Pegawai Dengan Pesan Berhasil Atau Gagal
        if ($status) {
        return redirect('/data-siswa')->with('berhasil' , 'Data Berhasil Di Tambah');
        }else {
        return redirect('/data-siswa')->with('error' , 'Data Gagal Di Tambahkan');
    }
    
    }

    public function edit (Request $request, $nim)
    {
        $data['siswa'] = \App\Siswa::where('nim', $nim)->first();
        $data['jurusan'] = \App\Jurusan::orderBy('kode_jur')->get();
     
        //passing data ke view
        return view ('/siswa.edit', $data);  
    }

    public function update ($nim, Request $request)
    {
        $rule = [
			'nim'=>'required|string',
			'nama'=>'required|string',
			'kode_jur'=>'required|string',
		];
		$this->validate($request, $rule);
		
		$input = $request->all();
		
		$siswa = \App\Siswa::find($input['nim']);
		$siswa->nama 		= $input['nama'];
		$siswa->kode_jur 	= $input['kode_jur'];
		$status = $siswa->update();
		
		if ($status) {
			return redirect('/data-siswa')->with('success', 'Data Berhasil Diubah');
		} else {
			return redirect('/data-siswa')->with('error', 'Data Berhasil Diubah');
		}
    }

    public function delete($nim)
    {
        DB::table('dev_siswa')->where('nim', $nim)->delete();

        return redirect('/data-siswa');
    }


}
	
