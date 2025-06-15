<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

    protected $table = 'admins';
    protected $fillable = [
        'nama', 'email', 'alamat_rumah', 'nomor_telepon', 'jenis_kelamin', 
        'tanggal_mulai_bekerja', 'password'
    ];

    protected $hidden = ['password']; // Jika ada password, sembunyikan dari output
}