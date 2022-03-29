<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class authController extends Controller
{
    public function halamanlogin(){
        return view ('login');
    }

    public function login(Request $request){
        // $data = User::where('email',$request->email)->firstOrFail();
        // if($data){
        //     if(Hash::check($request->password,$data->password)){
        //         session(['berhasil_login' => true]);
        //         return redirect('/dashboard');
        //     }
        // }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/dashboard');
        }
        return redirect('/')->with('message','Email atau password salah');
}
    //tampil data user
    public function tampil(){
        $data = DB::table('user')->paginate(5);
        Paginator::useBootstrap();
        return view('user',['user' => $data]);
        
    }

    //tampilan tambah data user
    public function tambah(){
        return view('user-tambah');
    }

    //simpan data user
    public function simpan(Request $request){
        $validator = $request->validate([
            'name' => 'required|string|max:100',
            'role' => 'required',
            'email'=>'required|unique:user,email,$id',
            'password'=>'required',
            ],
            [
                'name.required' => 'Nama user tidak boleh kosong!',
                'name.max' => 'Nama user melebihi batas!',
    
                'role.required' => 'Role harus diisi!',
    
                'email.required' => 'Alamat email tidak boleh kosong!',
                'email.unique' => 'Alamat email telah digunakan!',

                'password.required' => 'Password tidak boleh kosong!',
            ]
        );

        $user = User::create([
            'name'=>$request->get('name'),
            'role'=>$request->get('role'),
            'email'=>$request->get('email'),
            'password'=> bcrypt($request->get('password')),
            'remember_token' => Str::random(60),
            ]);
            return redirect()->route('tampil-user')->with('message-simpan','Data berhasil disimpan!');

    }

    //tampil edit profile
    public function edit($id){
        $user = DB::table('user')->where('id',$id)->first();
        return view('user-edit',['user' => $user]);
        // return view('user-edit');
    }

    //update data profile
    public function update(Request $request, $id){
       
    $validator = $request->validate([
        'name' => 'required|string|max:100',
        'role'=>'required|string',
        // 'email' =>'required',
        'password'=>'required',
        
        
        ],
        [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama melebihi batas!',
            
            'role.required' => 'Role tidak boleh kosong!',

            // 'email.required' => 'Alamat email tidak boleh kosong!',
            // 'email.unique' => 'Alamat email telah digunakan!',

            'password.required' => 'Password tidak boleh kosong!',


        ]
    );
    $user = User::where('id',$id)->update([
                'name'=>$request->get('name'),
                'role'=>$request->get('role'),
                // 'email'=>$request->get('email'),
                'password'=> bcrypt($request->get('password')),
                'remember_token' => Str::random(60),
            ]);
            
     return redirect()->route('tampil-user',$id)->with('message-update','Data berhasil diupdate!');
}

    //hapus data user
    public function hapus($id){
        $user = User::where('id',$id)->delete();
        return redirect()->back()->with('message-hapus','Data berhasil dihapus!');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect ('/');
    }

}

// public function store(Request $request)
    // {
    // 	$validator = Validator::make($request->all(), [
    //         'id_outlet' => 'required',
    //         'id_member' => 'required|string',
    //         'id_paket' => 'required|string',
    //         'qty' => 'required|min:1',
    //         'tgl'=>'required',
    //         'batas_waktu'=>'required',
    //         'tgl_bayar'=>'',
    //         'status'=>'required',
    //         'dibayar'=>'required',
    //     ]);
    //     if($validator->fails()){
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }        
        
    //     $transaksi = Transaksi::create([
    //         'id_outlet'=>$request->get('id_outlet'),
    //         'id_member'=>$request->get('id_member'),
    //         'id_paket'=>$request->get('id_paket'),
    //         'qty'=>$request->get('qty'),
    //         'tgl'=>$request->get('tgl'),
    //         'batas_waktu'=>$request->get('batas_waktu'),
    //         'tgl_bayar'=>$request->get('tgl_bayar'),
    //         'status'=>$request->get('status'),
    //         'dibayar'=>$request->get('dibayar'),
    //         ]);
            
    //         $id = $request->get('id_paket');
    //         $paket = Paket::all()->find($id);
    
    //         $detail = detail_transaksi::create([
    //         'id_transaksi' => $transaksi->id,
    //         'subtotal' => $transaksi->qty * $paket->harga,
    //         'keterangan' => '',
    //         ]);
            
    //     if($transaksi && $detail){
    //     	return response()->json(['status'=>'berhasil tambah data']);
    //     } else {
    //     	return response()->json(['status'=>false]);
    //     }
    // }
    // public function upd(Request $request, $id)
    // {
    //     $validator = $request->validate([
    //         'id_outlet' => 'required',
    //         'id_member' => 'required|string',
    //         'id_paket' => 'required|string',
    //         'qty' => 'required|min:1',
    //         'tgl'=>'required',
    //         'batas_waktu'=>'required',
    //         'tgl_bayar'=>'',
    //         'status'=>'required',
    //         'dibayar'=>'required',
    //         ],
    //         [
    //             'id_outlet.required' => 'Outlet tidak boleh kosong!',
    //             'id_member.required' => 'Nama member tidak boleh kosong!',
    //             'id_paket.required' => 'Jenis paket tidak boleh kosong!',
    //             'qty.required' => 'Berat tidak boleh kosong!',
    //             'qty.min' => 'Berat minimal min:! kg',
    //             'tgl.required' => 'Tanggal transaksi tidak boleh kosong!',
    //             'batas_waktu.required' => 'Batas waktu tidak boleh kosong!',
    //             'status.required' => 'Status tidak boleh kosong!',  
    //             'dibayar.required' => 'Status bayar tidak boleh kosong!',  
    //         ]
    //     );
    //     $transaksi = Transaksi::where('id',$id)->update([
    //         'id_outlet'=>$request->get('id_outlet'),
    //         'id_member'=>$request->get('id_member'),
    //         'id_paket'=>$request->get('id_paket'),
    //         'qty'=>$request->get('qty'),
    //         'tgl'=>$request->get('tgl'),
    //         'batas_waktu'=>$request->get('batas_waktu'),
    //         'tgl_bayar'=>$request->get('tgl_bayar'),
    //         'status'=>$request->get('status'),
    //         'dibayar'=>$request->get('dibayar'),
    //             ]);

    //         $id_paket = $request->get('id_paket');
    //         $paket = Paket::all()->find($id_paket);

    //         $detail = detail_transaksi::where('id_transaksi',$id)->update([
    //         'id_transaksi' => $id,
    //         'subtotal' => $request->get('qty') * $paket->harga,
    //         'keterangan' => '',
    //         ]);
    //     if($transaksi && $detail){
    //     	return response()->json(['status'=>'Berhasil Menambahkan data']);
    //     } else {
    //     	return response()->json(['status'=>false]);
    //     }
    // }
    // public function delete($id)
    // {
    //     $delete = Detail_Transaksi::where('id_transaksi',$id)->delete();
    //     $delete = Transaksi::where('id',$id)->delete();

    //     if ($delete) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data Transaksi Berhasil Dihapus',
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data Transaksi Gagal Dihapus'
    //         ]);
    //     }
    // }