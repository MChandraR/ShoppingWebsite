<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'total_harga',
        'produk_id',
        'telepon',
        'alamat',
        'status',
        'jumlah'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'pesanan_produk')
            ->withPivot('jumlah', 'harga');
    }
}
