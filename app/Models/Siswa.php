<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'student_id', 'address', 'gender', 'photo'
    ];

    public function ekstrakulikuler()
    {
        return $this->hasMany(Ekstrakulikuler::class);
    }
}
