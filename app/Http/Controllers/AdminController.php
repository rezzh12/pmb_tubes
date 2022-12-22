<?php

namespace App\Http\Controllers;
use App\Models\pendaftaran;
use App\Models\jadwal;
use App\Models\pembayaran;
use App\Models\program_studi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function pendaftaran()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::all();
        return view('data_pendaftar', compact('user', 'pendaftaran'));
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
    $Pendaftaran->tanggungan = $req->get('tanggungan');
    $Pendaftaran->asal_sekolah = $req->get('asal_sekolah');
    $Pendaftaran->alamat_sekolah = $req->get('alamat_sekolah');
    $Pendaftaran->status_pendaftaran = 'terdaftar';
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
    return redirect()->back();
    }
    public function view_input()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::all();
        $program_studi = program_studi::all();
        $jadwal = jadwal::all();
        return view('input_daftar', compact('user', 'pendaftaran', 'program_studi', 'jadwal'));
    }


    public function jadwal()
    {
        $user = Auth::user();
        $jadwal = Jadwal::all();
        return view('data_jadwal', compact('user', 'jadwal'));
    }
    public function submit_jadwal(Request $req)
    { $validate = $req->validate([
        'nama_kegiatan'=> 'required|max:255',
        'jenis_kegiatan'=> 'required',
        'tanggal_mulai'=> 'required',
        'tanggal_akhir'=> 'required',
    ]);
    $jadwal = new jadwal;
    $jadwal->nama_kegiatan = $req->get('nama_kegiatan');
    $jadwal->jenis_kegiatan = $req->get('jenis_kegiatan');
    $jadwal->tgl_mulai = $req->get('tanggal_mulai');
    $jadwal->tgl_akhir = $req->get('tanggal_akhir');
    $jadwal->save();

    Session::flash('status', 'Input data berhasil!!!');
    return redirect()->route('admin.jadwal');
    }

    public function getDatajadwal($id)
    {
        $jadwal = jadwal::find($id);
        return response()->json($jadwal);
    }

    public function update_jadwal(Request $req)
    { 
        $jadwal= jadwal::find($req->get('id'));
        
        $validate = $req->validate([
            'nama_kegiatan'=> 'required|max:255',
            'jenis_kegiatan'=> 'required',
            'tanggal_mulai'=> 'required',
            'tanggal_akhir'=> 'required',
    ]);
    $jadwal->nama_kegiatan = $req->get('nama_kegiatan');
    $jadwal->jenis_kegiatan = $req->get('jenis_kegiatan');
    $jadwal->tgl_mulai = $req->get('tanggal_mulai');
    $jadwal->tgl_akhir = $req->get('tanggal_akhir');
    $jadwal->save();
    Session::flash('status', 'Ubah data berhasil!!!');
    
    return redirect()->route('admin.jadwal');
    }

    public function delete_jadwal($id)
    {
        $jadwal = jadwal::find($id);
        $jadwal->delete();

        Session::flash('status', 'Hapus data berhasil!!!');
    
    return redirect()->route('admin.jadwal');
}

public function pembayaran()
    {
        $user = Auth::user();
        $pembayaran = pembayaran::all();
        return view('data_pembayaran', compact('user', 'pembayaran'));
    }
    public function submit_pembayaran(Request $req)
    { $validate = $req->validate([
        'no_kwitansi'=> 'required|max:255',
        'status_pembayaran'=> 'required',
        'tanggal_pembayaran'=> 'required',
        'NISN'=> 'required',
    ]);
    $pembayaran = new pembayaran;
    $pembayaran->no_kwitansi = $req->get('no_kwitansi');
    $pembayaran->status_pembayaran = $req->get('status_pembayaran');
    $pembayaran->tgl_pembayaran = $req->get('tanggal_pembayaran');
    $pembayaran->NISN = $req->get('NISN');
    $pembayaran->save();

    Session::flash('status', 'Input data berhasil!!!');
    return redirect()->route('admin.pembayaran');
    }

    public function getDatapembayaran($id)
    {
        $pembayaran = pembayaran::find($id);
        return response()->json($pembayaran);
    }

    public function update_pembayaran(Request $req)
    { 
        $pembayaran= pembayaran::find($req->get('id'));
         $validate = $req->validate([
            'no_kwitansi'=> 'required|max:255',
            'status_pembayaran'=> 'required',
            'tanggal_pembayaran'=> 'required',
            'NISN'=> 'required',
        ]);

        $pembayaran->no_kwitansi = $req->get('no_kwitansi');
        $pembayaran->status_pembayaran = $req->get('status_pembayaran');
        $pembayaran->tgl_pembayaran = $req->get('tanggal_pembayaran');
        $pembayaran->NISN = $req->get('NISN');
        $pembayaran->save();

    Session::flash('status', 'Ubah data berhasil!!!');
    
    return redirect()->route('admin.pembayaran');
    }

    public function delete_pembayaran($id)
    {
        $pembayaran = pembayaran::find($id);
        $pembayaran->delete();

        Session::flash('status', 'Hapus data berhasil!!!');
    
    return redirect()->route('admin.pembayaran');
}

public function prodi()
    {
        $user = Auth::user();
        $prodi = program_studi::all();
        return view('data_prodi', compact('user', 'prodi'));
    }
    public function submit_prodi(Request $req)
    { $validate = $req->validate([
        'kode_prodi'=> 'required|max:255',
        'nama_prodi'=> 'required',
       
    ]);
    $prodi = new program_studi;
    $prodi->kode_prodi = $req->get('kode_prodi');
    $prodi->nama_prodi = $req->get('nama_prodi');
    $prodi->save();

    Session::flash('status', 'Input data berhasil!!!');
    return redirect()->route('admin.prodi');
    }

    public function getDataprodi($id)
    {
        $prodi = program_studi::find($id);
        return response()->json($prodi);
    }

    public function update_prodi(Request $req)
    { 
        $prodi= program_studi::find($req->get('id'));
        $validate = $req->validate([
            'kode_prodi'=> 'required|max:255',
            'nama_prodi'=> 'required',
           
        ]);

        $prodi->kode_prodi = $req->get('kode_prodi');
        $prodi->nama_prodi = $req->get('nama_prodi');
        $prodi->save();
    
        Session::flash('status', 'Ubah data berhasil!!!');
        return redirect()->route('admin.prodi');
    }

    public function delete_prodi($id)
    {
        $prodi = program_studi::find($id);
        $prodi->delete();

        Session::flash('status', 'Hapus data berhasil!!!');
    
    return redirect()->route('admin.prodi');
}

}