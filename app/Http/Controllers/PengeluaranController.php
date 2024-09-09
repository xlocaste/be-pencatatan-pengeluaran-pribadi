<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengeluaranStoreRequest;
use App\Http\Requests\PengeluaranUpdateRequest;
use App\Http\Resources\PengeluaranResource;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        $daftarpengeluaran = Pengeluaran::with('jenisPengeluaran')->get();

        return PengeluaranResource::collection($daftarpengeluaran);
    }

    public function store(PengeluaranStoreRequest $request)
    {
        $pengeluaran = Pengeluaran::create([
            'nominal'=>$request->nominal,
            'tanggal'=>$request->tanggal,
            'catatan'=>$request->catatan,
            'jenis_pengeluaran_id'=>$request->jenis_pengeluaran_id,
        ]);

        return (new PengeluaranResource($pengeluaran))->additional([
            'message' => 'Data Berhasil di Tambahkan',
        ]);
    }

    public function update(PengeluaranUpdateRequest $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran->update([
            'nominal' =>$request->nominal,
            'tanggal' =>$request->tanggal,
            'catatan' =>$request->catatan,
            'jenis_pengeluaran_id' =>$request->jenis_pengeluaran_id,
        ]);

        return (new PengeluaranResource($pengeluaran))->additional([
            'message' => 'Data Berhasil di Update',
        ]);
    }

    public function show($pengeluaran)
    {
        $pengeluaran = Pengeluaran::findOrFail($pengeluaran);

        return (new PengeluaranResource($pengeluaran))->additional([
            'message' => 'Data Berhasil di Ambil',
        ]);
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return response()->json([
            'message' => 'Data Berhasil di Hapus',
        ]);
    }
}
