<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detail_periksa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_periksa',
        'id_obat',
    ];

    public function periksa():BelongsTo
    {
        return $this->belongsTo(periksa::class, 'id_periksa');
    }

    public function obat():BelongsTo
    {
        return $this->belongsTo(obat::class, 'id_obat');
    }
}
