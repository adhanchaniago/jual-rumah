<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $fillable = [
        'rumah_type_id',
        'perumahan_id',
        'block',
        'number',
        'subsidi',
        'harga',
        'booked_by',
        'document_approved',
    ];

    public function perumahan()
    {
        return $this->belongsTo(PerumAhan::class);
    }

    public function rumahType()
    {
        return $this->belongsTo(RumahType::class);
    }
}
