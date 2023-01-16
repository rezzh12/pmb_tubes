<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftaran;
use App\Models\user;
use App\Models\jadwal;
use App\Models\pembayaran;
use App\Models\pengumuman;
use App\Models\program_studi;
use App\Notifications\LoginNotification;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;
use PDF;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        return view('home_user');
       
    }
    public function view_input()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::all();
        $program_studi = program_studi::all();
        $jadwal = jadwal::all();
        return view('daftar_user', compact('user', 'pendaftaran', 'program_studi', 'jadwal'));
    }

    public function submit_pendaftar(Request $req)
    { $validate = $req->validate([
        'NISN'=> 'required|max:255',
        'nama'=> 'required',
        'jenis_kelamin'=> 'required',
        'agama'=> 'required',
        'email'=> 'required',
        'no_hp'=> 'required',
        'tempat_lahir'=> 'required',
        'tanggal_lahir'=> 'required',
        'alamat'=> 'required',
        'gelombang'=> 'required',
        'jurusan'=> 'required',
        'nama_ayah'=> 'required',
        'nama_ibu'=> 'required',
        'pekerjaan_ayah'=> 'required',
        'pekerjaan_Ibu'=> 'required',
        'no_kk'=> 'required',
        'gaji'=> 'required',
        'tanggungan'=> 'required',
        'asal_sekolah'=> 'required',
        'alamat_sekolah'=> 'required',
        'id_login'=> 'required',
    ]);
    $Pendaftaran = new Pendaftaran;
    $Pendaftaran->NISN = $req->get('NISN');
    $Pendaftaran->nama = $req->get('nama');
    $Pendaftaran->jenis_kelamin = $req->get('jenis_kelamin');
    $Pendaftaran->agama = $req->get('agama');
    $Pendaftaran->email = $req->get('email');
    $Pendaftaran->no_hp = $req->get('no_hp');
    $Pendaftaran->tempat_lahir = $req->get('tempat_lahir');
    $Pendaftaran->tanggal_lahir = $req->get('tanggal_lahir');
    $Pendaftaran->alamat = $req->get('alamat');
    $Pendaftaran->gelombang = $req->get('gelombang');
    $Pendaftaran->jurusan = $req->get('jurusan');
    $Pendaftaran->nama_ayah = $req->get('nama_ayah');
    $Pendaftaran->nama_ibu = $req->get('nama_ibu');
    $Pendaftaran->pekerjaan_ayah = $req->get('pekerjaan_ayah');
    $Pendaftaran->pekerjaan_Ibu = $req->get('pekerjaan_Ibu');
    $Pendaftaran->no_kk = $req->get('no_kk');
    $Pendaftaran->gaji = $req->get('gaji');
    $Pendaftaran->tanggungan = $req->get('tanggungan','orang');
    $Pendaftaran->asal_sekolah = $req->get('asal_sekolah');
    $Pendaftaran->alamat_sekolah = $req->get('alamat_sekolah');
    $Pendaftaran->status_pendaftaran = 'terdaftar';
    $Pendaftaran->id_login = $req->get('id_login');
    $Pendaftaran->tgl_pendaftaran = now();
    if($req->hasFile('pas_foto'))
    {
        $extension = $req->file('pas_foto')->extension();
        $filename = 'pas_foto'.time().'.'.$extension;
        $req->file('pas_foto')->storeAS('public/pas_foto', $filename);
        $Pendaftaran->pas_foto = $filename;
    }
    if($req->hasFile('slip_gaji'))
    {
        $extension = $req->file('slip_gaji')->extension();
        $filename = 'slip_gaji'.time().'.'.$extension;
        $req->file('slip_gaji')->storeAS('public/slip_gaji', $filename);
        $Pendaftaran->slip_gaji = $filename;
    }
    if($req->hasFile('nilai_raport'))
    {
        $extension = $req->file('nilai_raport')->extension();
        $filename = 'nilai_raport'.time().'.'.$extension;
        $req->file('nilai_raport')->storeAS('public/nilai_raport', $filename);
        $Pendaftaran->nilai_raport = $filename;
    }
    if($req->hasFile('ijazah'))
    {
        $extension = $req->file('ijazah')->extension();
        $filename = 'ijazah'.time().'.'.$extension;
        $req->file('ijazah')->storeAS('public/ijazah', $filename);
        $Pendaftaran->ijazah = $filename;
    }
    if($req->hasFile('prestasi'))
    {
        $extension = $req->file('prestasi')->extension();
        $filename = 'prestasi'.time().'.'.$extension;
        $req->file('prestasi')->storeAS('public/prestasi', $filename);
        $Pendaftaran->prestasi = $filename;
    }
    $Pendaftaran->save();

    Session::flash('status', 'Input data berhasil!!!');
    return redirect()->route('home');
    }

    public function view_pendaftaran($id){
        $user = Auth::user();
        $pendaftaran =  pendaftaran::with('pembayaran')->where('id_login',$id)->get();
        return view('pendaftaran', compact('user', 'pendaftaran'));
       
    }
    public function print_bukti($id){
        $pendaftaran =  pendaftaran::with('pembayaran')->where('id_login',$id)->get();
        $pendaftaran =  pendaftaran::with('pembayaran1')->where('id_login',$id)->get();
        $pdf = PDF::loadview('print_bukti',['pendaftarans'=>$pendaftaran]);
        return $pdf->download('bukti_pendaftaran.pdf');
    }
}
