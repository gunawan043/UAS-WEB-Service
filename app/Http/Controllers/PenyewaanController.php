<?php

namespace App\Http\Controllers;

use App\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// except kecuali
// only hanya
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        // $penyewaan = Penyewaan::all();
        $penyewaan = Penyewaan::with('sewa','lapangan')->get();
        return response()->json($penyewaan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Penyewaan::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function show($penyewaan)
    {
        // $data = Penyewaan::where('id_sewa', $penyewaan)->first();
        $data = Penyewaan::with('sewa','lapangan')-> where('id_sewa',$penyewaan)->first();
        if (!empty($data)){
            return $data;
        }

        return response()->json(['message' => 'Data Tidak Ditemukan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyewaan $penyewaan)
    {
        $penyewaan->update($request->all());
        return response()->json([
                  "message" => "Data Berhasil Di Update"
                ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($penyewaan)
    {
        $data = Penyewaan::where('id_sewa', $penyewaan)->first();
        if (empty($data)){
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }

        $data->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}

