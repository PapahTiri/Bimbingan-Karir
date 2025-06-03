<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class periksa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_janji_periksa',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    protected $casts = [
        'tgl_periksa' => 'datetime',
    ];

    public function janjiPeriksas():BelongsTo
    {
        return $this->belongsTo(janji_periksa::class, 'id_janji_periksa');
    }

    public function detailPeriksas():HasMany
    {
        return $this->hasMany(detail_periksa::class, 'id_periksa');
    }
}
