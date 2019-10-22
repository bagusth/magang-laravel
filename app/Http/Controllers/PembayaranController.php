<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Pembayaran;

class PembayaranController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pembayaran'] = \App\Pembayaran::orderBy('no_bayar')->paginate(10);

        return view('pembayaran.data-pembayaran', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['siswa'] = \App\Siswa::orderBy('nim')
        ->get();
        $data['data_tagihan'] = DB::table('dev_tagihan_d')
                    ->join('dev_tagihan_m','dev_tagihan_m.no_tagihan','=','dev_tagihan_d.no_tagihan')->get();
        $data['data_pembayaran'] = \App\DataPembayaran::orderBy('no_bayar')
                            ->get();
        return view ('pembayaran.tambah-ambyar', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
			'nim'=>'required|string',
			'tanggal'=>'required|string',
			'keterangan'=>'required|string',
			'periode'=>'required|string',
		];
		$this->validate($request, $rule);
		
		$input = $request->all();
		
		$pembayaran = new \App\Pembayaran;
		$pembayaran->kode_lokasi	= $input['kode_lokasi'];
		$pembayaran->nim			= $input['nim'];
		$pembayaran->tanggal 		= $input['tanggal'];
		$pembayaran->keterangan 	= $input['keterangan'];
		$pembayaran->periode 		= $input['periode'];
		$status = $pembayaran->save();
		
		if ($status) {
			return redirect('/data-pembayaran')->with('success', 'Data Berhasil Ditambahkan');
		} else {
			return redirect('/data-pembayaran')->with('error', 'Data Gagal Ditambahkan');
		}
    }


    public function storeBayar(Request $request)
	{
		$rule = [
			'no_tagihan'=>'required|string',
			'keterangan'=>'required|string',
			'nilai'=>'required|string',
		];
		$this->validate($request, $rule);
		
		$input = $request->all();
		
		$pembayaran = new \App\DataPembayaran;
		$pembayaran->no_tagihan			= $input['no_tagihan'];
		$pembayaran->no_bayar			= $input['no_bayar'];
		$pembayaran->kode_lokasi		= $input['kode_lokasi'];
		$pembayaran->nilai			 	= $input['nilai'];
		$status = $pembayaran->save();
		
		if ($status) {
			return redirect('/data-pembayaran')->with('success', 'Data Berhasil Dibayar');
		} else {
			return redirect('/data-pembayaran')->with('error', 'Data Gagal Dibayar');
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $data['siswa'] = \App\Siswa::orderBy('nim')->get();
					
		$data['data_tagihan'] = DB::table('dev_tagihan_d')
							->join('dev_tagihan_m','dev_tagihan_m.no_tagihan','=','dev_tagihan_d.no_tagihan')
							->where('nim', $nim)
							->get();
		$data['data_pembayaran'] = \App\DataPembayaran::orderBy('no_bayar')
									->get();
		$data['pembayaran'] = DB::table('dev_bayar_m')
                            ->where('nim', $nim)->first();
                            
        return view('pembayaran.edit-pembayaran', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $rule = [
			'nim'=>'required|string',
			'tanggal'=>'required|string',
			'keterangan'=>'required|string',
			'periode'=>'required|string',
		];
		$this->validate($request, $rule);
		
		$input = $request->all();
		
		$pembayaran = \App\Pembayaran::find($nim);
		// $status = $pembayaran->update($input);
		$pembayaran->kode_lokasi	= $input['kode_lokasi'];
		$pembayaran->nim			= $input['nim'];
		$pembayaran->tanggal 		= $input['tanggal'];
		$pembayaran->keterangan 	= $input['keterangan'];
		$pembayaran->periode 		= $input['periode'];
		$status = $pembayaran->update();
		
		if ($status) {
			return redirect('/data-pembayaran')->with('success', 'Data Berhasil Diubah');
		} else {
			return redirect('/data-pembayaran')->with('error', 'Data Berhasil Diubah');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $pembayaran = \App\Pembayaran::find($nim);
        $pembayaran->delete();

        return redirect('/data-pembayaran')->with(['message'=> 'Successfully deleted!!']);
    }
}
