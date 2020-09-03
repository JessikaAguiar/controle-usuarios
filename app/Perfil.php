<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['nome'];
    
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
