<?php

namespace App\Http\Resources;

use App\Models\JenisPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PengeluaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this -> id,
            'nominal' => $this -> nominal,
            'tanggal' => $this -> tanggal,
            'catatan' => $this -> catatan,
            'jenis_pengeluaran_id' => $this -> jenis_pengeluaran_id,

            'jenisPengeluaran' => new JenisPengeluaranResource($this->whenLoaded('jenisPengeluaran'))
        ];
    }
}
