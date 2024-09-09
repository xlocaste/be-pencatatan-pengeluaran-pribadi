<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\JenisPengeluaranStoreRequest;
use App\Http\Requests\JenisPengeluaranUpdateRequest;
use App\Http\Resources\JenisPengeluaranResource;

class JenisPengeluaranController extends Controller
{
    public function index()
    {
        $daftarJenisPengeluaran = JenisPengeluaran::all();

        return JenisPengeluaranResource::collection($daftarJenisPengeluaran);
    }

    public function store(JenisPengeluaranStoreRequest $request)
    {
        $jenisPengeluaran = JenisPengeluaran::create([
            'nama' => $request->nama,
        ]);

        return (new JenisPengeluaranResource($jenisPengeluaran))->additional([
            'message' => 'Data Berhasil di Tambahkan',
        ]);
    }

    public function update(JenisPengeluaranUpdateRequest $request, JenisPengeluaran $jenisPengeluaran)
    {
        $jenisPengeluaran->update([
            'nama'=>$request->nama,
        ]);

        return (new JenisPengeluaranResource($jenisPengeluaran))->additional([
            'message' => 'Data Berhasil di Update',
        ]);
    }

    public function show($jenisPengeluaran)
    {
        $jenisPengeluaran = JenisPengeluaran::findOrFail($jenisPengeluaran);

        return (new JenisPengeluaranResource($jenisPengeluaran))->additional([
            'message' => 'Data Berhasil di Tampilkan',
        ]);
    }

    public function destroy(JenisPengeluaran $jenisPengeluaran)
    {
        $jenisPengeluaran->delete();

        return response()->json([
            'message' => 'Data Berhasil di Hapus',
        ]);
    }
}
