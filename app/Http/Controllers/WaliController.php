<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wali;
use App\Models\Siswa;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wali = Wali::with('siswa')->get();
        $activate = "wali";
        return view('wali.index', ['wali'=>$wali, 'activate']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('wali.index', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'=>'required',
            'id_siswa'=>'required|unique:walis',
            'foto'=>'required|image|max:2048',
        ]);
        $wali = new Wali();
        $wali->nama=$request->nama;
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $name = rand(1000, 9999). $image->getClientOriginalName();
            $image->move('image/wali/'. $name);
            $wali->foto = $name;
        }
        $wali->id_siswa = $request->id_siswa;
        $wali->save();
        return redirect()->route('wali.index')->with('succes','Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wali = Wali::findOrFail($id);
        return view('wal.show', compact('wali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wali = Wali::findOrFail($id);
        $siswa = Siswa::all();
        return view('wali.edit', compact('wali', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'=>'required',
            'id_siswa'=>'required|unique:walis',
            'foto'=>'required|image|max:2048',
        ]);
        $wali = new Wali();
        $wali->nama=$request->nama;
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $name = rand(1000, 9999). $image->getClientOriginalName();
            $image->move('image/wali/'. $name);
            $wali->foto = $name;
        }
        $wali->id_siswa = $request->id_siswa;
        $wali->save();
        return redirect()->route('wali.index')->with('succes','Data berhasil dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wali = Wali::findOrFail($id);
        $wali->deleteImage();
        $wali->delete();
        return redirect()->route('wali.index')->with('succes', 'Data berhasil di edit!');
    }
}
