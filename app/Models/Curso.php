<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    protected $fillable = ['salon','id_sede','id_jornada'];



    public function scopeConsultaCurso($query, $busquedaCurso)
    {
    if($busquedaCurso)
    return $query->where('salon','LIKE',"%$busquedaCurso%");
    }


    public function sede()
    {
        return $this->belongsTo('App\Models\Sede','id_sede');
    }

    public function jornada()
    {
        return $this->belongsTo('App\Models\Jornada','id_jornada');
    }









}
