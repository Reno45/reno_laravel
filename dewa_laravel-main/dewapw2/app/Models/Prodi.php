<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'prodis';

    protected $fillable = ['nama', 'fakulitas_id'];
    public function fakulitas()
    {
        return $this->belongsTo(Fakulitas::class, 'fakulitas_id');
    }
}
