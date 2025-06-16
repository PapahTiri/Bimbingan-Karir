<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class obat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'obats';
    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga',
    ];
    protected $dates = ['deleted_at'];

    public function detail_periksas():HasMany
    {
        return $this->hasMany(detail_periksa::class, 'id_obat');
    }
}
