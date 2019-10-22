<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
    {
		$data['siswa'] = \App\Siswa::count();
		$data['tagihan'] = \App\Tagihan::count();
		$data['pembayaran'] = \App\Pembayaran::count();
		
        return view('/index', $data);
    }
    
}
