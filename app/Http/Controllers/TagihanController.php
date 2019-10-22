<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Tagihan;

class TagihanController extends Controller
{


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
        $data['tagihan'] = \App\Tagihan::orderBy('no_tagihan')->paginate(10);
        
        return view('tagihan.data-tagihan', $data);
    }

    public function tambah()
    {
        $data['siswa'] = \App\Siswa::orderBy('nim')->get();
        $data['jenis'] = \App\Jenis::orderBy('kode_jenis')->get();
        $data['data_tagihan'] = DB::table('dev_tagihan_d')->join('dev_jenis','dev_jenis.kode_jenis','=','dev_tagihan_d.kode_jenis')->get();

        return view('tagihan.tambah-tagihan', $data);
    }

    public function store(Request $request)
    {
        $rule = [
            'nim'=>'required|string',
            'tanggal'=>'required|string',
            'keterangan'=>'required|string'
        ];

        $this->validate($request, $rule);

        $input = $request->all();

        $tagihan = new \App\Tagihan;
        $tagihan->kode_lokasi  = $input['kode_lokasi'];
        $tagihan->nim  = $input['nim'];
        $tagihan->tanggal = $input['tanggal'];
        $tagihan->keterangan =$input['keterangan'];
        $status = $tagihan->save();

        if ($status){
            return redirect('/data-tagihan')->with('success', 'Ciee berhasil');
        } else{
            return redirect('/data-tagihan')->with('error', 'Ahh gagal');
        }


    }

    public function storeAdd(Request $request)
    {
        $rule = [
			'kode_jenis'=>'required|string',
			'nilai'=>'required|string',
		];
		$this->validate($request, $rule);
		
		$input = $request->all();
		
		$tagihan = new \App\DataTagihan;
		$tagihan->no_tagihan		= $input['no_tagihan'];
		$tagihan->kode_lokasi		= $input['kode_lokasi'];
		$tagihan->kode_jenis 		= $input['kode_jenis'];
		$tagihan->nilai			 	= $input['nilai'];
		$status = $tagihan->save();
		
		if ($status) {
			return redirect('/data-tagihan')->with('success', 'Data Berhasil Ditambahkan');
		} else {
			return redirect('/data-tagihan')->with('error', 'Data Gagal Ditambahkan');
		}
    }

    public function edit(Request $request, $no_tagihan)
    {
        $data['siswa'] = \App\Siswa::orderBy('nim')
						->get();
		$data['jenis'] = \App\Jenis::orderBy('kode_jenis')
                        ->get();
        $data['data_tagihan'] = DB::table('dev_tagihan_d')
                        ->join('dev_jenis','dev_jenis.kode_jenis','=','dev_tagihan_d.kode_jenis')
                        ->join('dev_tagihan_m','dev_tagihan_m.no_tagihan','=','dev_tagihan_d.no_tagihan')
                        ->where('dev_tagihan_d.no_tagihan', $no_tagihan)
                        ->get();
                        
        $data['tagihan'] = DB::table('dev_tagihan_m')->where('no_tagihan', $no_tagihan)->first();
        
		
		return view('tagihan.edit-tagihan', $data);
    }


    public function update(Request $request, $no_tagihan)
	{
		$rule = [
			'nim'=>'required|string',
			'tanggal'=>'required|string',
			'keterangan'=>'required|string',
		];
		$this->validate($request, $rule);
		
		$input = $request->all();
		
		$tagihan = \App\Tagihan::find($no_tagihan);
		// $status = $tagihan->update($input);
		$tagihan->kode_lokasi	= $input['kode_lokasi'];
		$tagihan->nim			= $input['nim'];
		$tagihan->tanggal 		= $input['tanggal'];
		$tagihan->keterangan 	= $input['keterangan'];
		$status = $tagihan->update();
		
		if ($status) {
			return redirect('/data-tagihan')->with('success', 'Data Berhasil Diubah');
		} else {
			return redirect('/data-tagihan')->with('error', 'Data Berhasil Diubah');
		}
    }
    
    public function updateAdd(Request $request)
	{
		$rule = [
			'nilai'=>'required|string',
			'kode_jenis'=>'required|string',
		];
		$this->validate($request, $rule);
		
		$input = $request->all();
		
		$tagihan = \App\DataTagihan::find($input['kode_jenis']);
		$tagihan->nilai 		= $input['nilai'];
		$tagihan->kode_jenis 	= $input['kode_jenis'];
		$status = $tagihan->update();
		
		if ($status) {
			return redirect('/data-tagihan')->with('success', 'Data Berhasil Diubah');
		} else {
			return redirect('/data-tagihan')->with('error', 'Data Berhasil Gagal');
		}
	}

     public function delete($no_tagihan)
    {
        $tagihan = \App\Tagihan::find($no_tagihan);
        $tagihan->delete();

        return redirect('/data-tagihan')->with(['message'=> 'Successfully deleted!!']);
    }

    public function deleteAdd($nilai)
    {
        $tagihan = \App\DataTagihan::where('nilai',$nilai);
		$status = $tagihan->delete();
		
		if ($status) {
			return redirect('/data-tagihan')->with('success', 'Data berhasil dihapus');
		} else {
			return redirect('/data-tagihan')->with('error', 'Data gagal dihapus');
		}
    }
}
