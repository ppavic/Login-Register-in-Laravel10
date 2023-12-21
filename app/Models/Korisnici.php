<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korisnici extends Model
{
    use HasFactory;
    
    /**
    *  ako u migraciji promjenimo naziv 'kirisnicis' koje je laravel automatski postavio u novo ime 'korisnici'
    * onda moramo u modelu definirati kako se tablica točno zove.
    **/
    protected $table='korisnici';
    /**
     * varijabla koja je nužna za dodavanje u bazu
     * 
     */
                
    protected $fillable = ['ime', 'prezime', 'email', 'password'];
}
