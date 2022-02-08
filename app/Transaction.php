<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    Use AutoNumberTrait;
    protected $table = 'transactions';
    protected $guarded =  [];

    public function getAutoNumberOptions()
    {
        return [
            'no_faktur' => [
                'format' => function() {
                    return 'TR/'.date('Ymd').'/?';
                },
                'length' => 5
            ]
            ];
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'kodebarang_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
