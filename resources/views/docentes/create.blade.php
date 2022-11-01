@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center "><a><i class="icono fas fa-user-cog"></i> Crear Docente</a>
    </div>
    <div class="card-body">
      <div class="container-cssform">
        <form method="POST" action="{{ route('docente.store') }}" id="form" >
        {!!csrf_field() !!}
          <div class="row justify-content-center ">
            <div class=" col-sm-8 col-md-8 col-lg-6 mt-4">
             <div class="card">
              <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
              <div class="card-body">  
                <div class="form-group ">
                    <label class="asterisko"> Nombre completo</label>
                    <input type="text" class="form-control form-control-sm" id="inputNombres" name="nombres" value="{{ old('nombres') }}" placeholder="ej: Carlos Daniel Aragon Niño "required data-parsley-pattern="^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Lugar de Residencia</label>
                    <input type="text" class="form-control form-control-sm" id="inputlugarDeResidencia" name="lugarDeResidencia" value="{{ old('lugarDeResidencia') }}" placeholder="ej: soacha cundinamarca"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    
                    <label class="asterisko">correo electrónico</label>
                    <input type="email" class="form-control form-control-sm" id="inputEmail" name="email" value="{{ old('email') }}" placeholder="ej: luz@gmail.com"required data-parsley-type="email" data-parsley-maxlength="50" data-parsley-trigger="keyup"  />
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>
                <div class="form-group ">
                    <label class="asterisko">Direccion</label>
                    <input type="text" class="form-control form-control-sm" id="inputDireccion" name="direccion" value="{{ old('direccion') }}" placeholder="ej: Carrera 7 Este #34-17"required data-parsley-pattern="/(^[A-Za-z0-9 ]+$)+/" data-parsley-length="[5, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                        <label class="asterisko">Telefono</label>
                        <input type="text" class="form-control form-control-sm" id="inputTelefono" name="telefono" value="{{ old('telefono') }}" placeholder="ej: 0315783423 fijo ó movil 3214567890"required data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="digits" data-parsley-trigger="keyup" />
                        {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Documento</label>
                    <input type="text" class="form-control form-control-sm" id="inputDocumento" name="documento" value="{{ old('documento') }}" placeholder="ej: 1024478980"required data-parsley-length="[8, 10]" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('documento','<span class=error>:message</span>')!!}
                </div>
            
           
                <div class="form-group ">
                    <label class="asterisko">Escalafon</label>
                        <select id="inputEscalafon" class="form-control form-control-sm" name="id_escalafon" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($escalafonn as $escalafon =>$Escalafon)
                                <option value="{{ $escalafon }}" {{ old('id_escalafon') }} > {{$Escalafon }} </option>
                                {!!$errors->first('id_escalafon','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                
                <div class="form-group ">
                        <label class="asterisko">Perfil</label>
                        <select id="inputPerfil" class="form-control form-control-sm" name="id_perfil"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($perfill as $perfil => $Perfil)
                                <option value="{{ $perfil }}" {{ old('id_perfil') }} > {{$Perfil }} </option>
                                {!!$errors->first('id_perfil','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Nivel</label>
                        <select id="inputNivel" class="form-control form-control-sm" name="id_nivel"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($nivell as $nivel => $Nivel)
                                <option value="{{ $nivel }}" {{ old('id_nivel') }} > {{$Nivel }} </option>
                                {!!$errors->first('id_nivel','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Estudios</label>
                        <select id="inputareaDeEstudio" class="form-control form-control-sm" name="areaDeEstudio"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($areaDeEstudioo as $areaEstudio => $Nombre)
                                <option value="{{ $areaEstudio }}" {{ old('id_areaDeEstudio') }} > {{$Nombre }} </option>
                                {!!$errors->first('areaDeEstudio','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Contraseña</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" value="{{ old('password') }}" placeholder="Min 8 caracteres, 1 mayuscula, 1 numero"required data-parsley-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/" data-parsley-minlength="8" data-parsley-trigger="keyup" />
                    {!!$errors->first('password','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Confirmar contraseña</label>
                    <input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation"  value="{{ old('password') }}" placeholder="Min 8 caracteres, 1 mayuscula, 1 numero"required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
                    {!!$errors->first('password_confirmation','<span class=error>:message</span>')!!}  
                </div>
                <div class="form-group ">
                    <div class="form-check">
                        <small id="passwordHelpInline" class="text-muted asterisko">
                            Roles 
                        </small>
                        @foreach ($roles as $id_role => $Nombre)
                            @if ($loop->first)
                                <label class="form-check btn btn-light">
                                    <input
                                    type="checkbox" 
                                    value="{{ $id_role }}"
                                     
                                    name="roles[]" >
                                    {{ $Nombre }}
                                </label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->
                            @endif
                            @if ($loop->last)
                            <label class="form-check btn btn-light">
                                    <input
                                    type="checkbox" 
                                    value="{{ $id_role }}"
                                     
                                    name="roles[]">
                                    {{ $Nombre }}
                                </label><!--la linea del metodo pluck, verifica el role en la base de datos y muestra el check en el checkbox-->    
                            @endif
                        @endforeach	  			
                        {!!$errors->first('roles','<span class=error>:message</span>')!!}
                    </div>
                </div>
            
                <button type="submit" class="btn btn-success btn-sm btn-block">Crear Docente</button>
              </div>
             </div>  
            </div>
          </div>   
        </form> 
      </div>
    </div>
  </div>
</div>

@endsection