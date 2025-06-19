<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private $arr = [
        ['id' => 1, 'nama' => 'aaa', 'kelas' => 'xi rpl 3'],
        ['id' => 2, 'nama' => 'kyy', 'kelas' => 'xi rpl 3'],
        ['id' => 3, 'nama' => 'muuu', 'kelas' => 'xi rpl 3'],
    ];
    public function index() //memberikan daftar data
    {
        $siswa = session('siswa_data', $this->arr);
        return view('siswa.index', ['siswa' => $siswa]);
    }
    public function show($id)
    {
        $siswa = collect($this->arr)->firstWhere('id', $id);
//jika data tidak ada
        if (! $siswa) {
            abort(404);
        }
        return view('siswa.show', compact('siswa'));
    }
    public function create()
    {
        return view('siswa.create');

    }
    public function store(Request $request)
    {
        $siswa = session('siswa_data', $this->arr);
//membuat id otomatis
        $newId = collect($siswa)->max('id') + 1;
//tambah data
        $siswa[] = [
            'id'    => $newId,
            'kelas' => $request->kelas,
            'nama'  => $request->nama,
        ];

//simpan ke array data
     $data =   session(['siswa_data' => $siswa]);

//kembali ke halaman siswa
        return redirect('/siswa');
    }
    public function edit($id)
    {
        $siswa = collect($this->arr)->firstWhere('id', $id);

//jika data tidak ada
        if (! $siswa) {
            abort(404);

        }

        return view('siswa.edit', compact('siswa'));

    }

    public function update(Request $request, $id)
    {
      
        $data = session('siswa_data', $this->arr);
    
     
        $siswaId = collect($data)->search(fn($item) => $item['id'] == $id);
    
       
            $data[$siswaId]['nama'] = $request->nama;
            $data[$siswaId]['kelas'] = $request->kelas;
    
        
            session(['siswa_data' => $data]);
            
    
        return redirect('siswa');
    }
    

public function destroy($id)
{

$siswa = session('siswa_data',$this->arr);
//mencari array ysang sama dri column id
$index = array_search($id, array_column($siswa,'id'));

//hapus data berdasarkan id dari index array
array_splice($siswa,$index,1);

//merefresh data ke session
session(['siswa_data' => $siswa]);
return redirect('siswa');

}




}
