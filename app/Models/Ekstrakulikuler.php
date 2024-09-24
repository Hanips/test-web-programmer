<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;
    protected $table = 'ekstrakulikulers';
    protected $fillable = [
        'name','siswa_id','start_year'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}
