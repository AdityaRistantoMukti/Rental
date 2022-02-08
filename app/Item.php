<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    Use AutoNumberTrait;
    protected $table = 'items';
    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'kode_barang' => [
                'format' => function() {
                    return 'BR/'.date('Ymd').'/?';
                },
                'length' => 5
            ]
            ];
    }

    public function transaksi()
    {
        return $this->hasMany(Transaction::class);
    }
}
