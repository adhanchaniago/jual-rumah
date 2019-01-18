<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Rumah extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $fillable = [
        'rumah_type_id',
        'perumahan_id',
        'block',
        'number',
        'subsidi',
        'harga',
        'description',
        'booked_by',
        'document_approved',
        'longitude',
        'latitude'
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

    public function rumahType()
    {
        return $this->belongsTo(RumahType::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class,'booked_by');
    }
}
