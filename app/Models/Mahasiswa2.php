<?php 
namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class Mahasiswa2 extends Model 
{ 
    protected $table = 'mahasiswa2'; 
    protected $fillable = [
        'nim', 
        'nama', 
        'jurusan',
        'email', 
    ]; 
} 