<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Order extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['code','user_id','rumah_id','confirmed','confirmed_at','valid_until','total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function angsuran()
    {
        return $this->hasMany(Angsuran::class);
    }
}
