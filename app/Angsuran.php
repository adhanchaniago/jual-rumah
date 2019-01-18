<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Angsuran extends Model implements HasMedia
{
	use HasMediaTrait;
	
    protected $fillable = [
    	'order_id',
		'kode',
		'total',
		'verified',
		'paid',
		'tanggal_bayar',
		'tanggal_tempo',
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
