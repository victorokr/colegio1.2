<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AcudientesResetPasswordNotification;

class Responsable extends Authenticatable
{

    use Notifiable; //se llamo el trait para poder reestablecer la contraseña

    protected $table = 'responsable';
    protected $primaryKey = 'id_responsable';
    protected $fillable = ['nombres','apellidos','documento','telefono',
    'direccion','email','lugarDeResidencia','password','id_parentesco','id_tipoDocumento'];


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AcudientesResetPasswordNotification($token));
    }


    public function hasRoles(array $roles)
    {
        foreach ($roles as $role)
         {
             foreach ($this->roles as $responsableRol)//$this->role hace referencia al campo rol en la abase de datos
             {

                if ($responsableRol->Nombre === $role)
                {
                    return true;
                }


             }
            
         }



        return false;
    }



    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','responsable_role','id_responsable','id_role');//el primero pertenece a la tabla pivot, 2do a la tabla empleado para evitar que eloquen lo busque en orden alfabetico, 3ro el id de la tabla a relacionar, tabla role.
    }



    // public function setPasswordAttribute($password)//modifica el password encriptandolo
    // {
    //     $this->attributes['password']=bcrypt($password);
    // }



    public function tipoDeDocumento()
    {
        return $this->belongsTo('App\Models\Tipodocumento','id_tipoDocumento');
    }


    public function parentesco()
    {
        return $this->belongsTo('App\Models\Parentesco','id_parentesco');
    }

    public function responsabledos()
    {
        return $this->belongsToMany('App\Models\Responsabledos','Responsabledos_responsable','id_responsable','id_responsabledos');
    }

    public function ocupacion()
    {
        return $this->belongsToMany('App\Models\Ocupacion','Responsable_ocupacion','id_responsable','id_ocupacion');
    }


    public function scopeAcudiente($query, $nombreResponsable)
    {
        if($nombreResponsable)
        return $query->where('nombres','LIKE',"%$nombreResponsable%")
        ->orWhere('apellidos','LIKE',"%$nombreResponsable%");
    }


}
