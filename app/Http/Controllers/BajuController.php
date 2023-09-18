<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;


class BajuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baju = Baju::paginate(10);

        return View('toko.index', compact('baju'));
        
        // untuk mengecek data
        // echo "<pre>";
        // print_r($baju);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('toko.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //require dalam validasi data
        $this->validate($request, [
            'merek_baju' => 'required',
            'harga_baju' => 'required',
            'ukuran_baju' => 'required',
            'foto_baju' => 'required|max:2040'
        ]);

        //mengambil file dengan name="foto_baju"
        $foto = $request->file('foto_baju');

        //mengambil hash name foto
        $foto->getClientOriginalName();

        //meletakkan foto kedalam public dengan ditambahkan folder foto secara otomatis
        $foto->move('foto', $foto->getClientOriginalName());

        //mendeklarasikan semua data
        $baju = new Baju;
        $baju->merek_baju = $request->merek_baju;
        $baju->ukuran_baju = $request->ukuran_baju;
        $baju->harga_baju = $request->harga_baju;
        $baju->foto_baju = $foto->getClientOriginalName();

        //menyimpan data ke database
        $baju->save();

        // return redirect()->route('toko.baju')->with(['success' => 'Data Berhasil Disimpan!']);
        return redirect()->route('toko.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gass = Baju::find($id);
        return view('toko.show', compact('gass'));
        // echo "<pre>";
        // print_r($gass);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Baju::find($id);
        return view('toko.edit', compact('post'));

        // echo "<pre>";
        // print_r($post);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->validate($request, [
        //     'merek_baju' => 'required',
        //     'ukuran_baju' => 'required',
        //     'harga_baju' => 'required',
        //     'gambar_baju' => 'required'
        // ]);

        $baju = Baju::find($id);

        if ($request->hasFile('foto_baju')) {

            // upload new image
            $foto = $request->file('foto_baju');
            $foto->move('foto', $foto->getClientOriginalName());

            //delete old foto
            unlink('foto/' . $baju->foto_baju);

            // update all data
            $baju->update([
                'merek_baju' => $request->merek_baju,
                'ukuran_baju' => $request->ukuran_baju,
                'harga_baju' => $request->harga_baju,
                'foto_baju' => $foto->getClientOriginalName()
            ]);

        }
            else {
                 $baju->update([
                'merek_baju' => $request->merek_baju,
                'ukuran_baju' => $request->ukuran_baju,
                'harga_baju' => $request->harga_baju]);
            }

            return Redirect()->route('toko.index');

        // kalau dari awal sudah menggunakan "getClientOriginalName" maka seterusnya apabila mau mengambil
        // data image diharuskan menggunakan perintah awalan tersebut 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baju = Baju::find($id);

        // echo "<pre>";
        // print_r($baju);

        unlink('foto/' . $baju->foto_baju);

        Baju::where("id", $baju->id)->delete();


        return Redirect()->route('toko.index');
    }
}
