<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';

    protected $fillable = [
        'nominal',
        'tanggal',
        'catatan',
        'jenis_pengeluaran_id',
    ];

    public function jenisPengeluaran()
    {
        return $this->belongsTo(JenisPengeluaran::class);
    }
}
