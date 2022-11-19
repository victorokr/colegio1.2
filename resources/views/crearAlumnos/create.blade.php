@extends('layouts.app')
@section('content')



<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3" >
    <div class="card-header text-center "><a><i class="icono fas fa-user-cog"></i> Matricular Alumno</a></div>
     <div class="card-body ">
      <div class="container-cssform">
        <form method="POST" action="{{ route('alumnosmatricula.store') }}" id="form" >
        {!!csrf_field() !!}
        
            <div class="row justify-content-center ">
              <div class=" col-md-6 col-sm-6 col-lg-4 mt-4">
                <div class="card">
                    <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
                  <div class="card-body">  
                    <div class="form-group">
                        <label class="asterisko">Nombres</label>
                        <input type="text" class="form-control form-control-sm" id="inputNombres" name="nombres" value="{{ old('nombres') }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                        {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                    </div>
                    
                    <div class="form-group">
                        <label class="asterisko">Documento</label>
                        <input type="text" class="form-control form-control-sm" id="inputDocumento" name="documento" value="{{ old('documento') }}" required data-parsley-length="[10, 10]" data-parsley-type="digits" data-parsley-trigger="keyup" />
                        {!!$errors->first('documento','<span class=error>:message</span>')!!}
                    </div>
                    
                    <div class="form-group ">
                        <label class="asterisko">Lugar de Residencia</label>
                        <input type="text" class="form-control form-control-sm" id="inputlugarDeResidencia" name="lugarDeResidencia" value="{{ old('lugarDeResidencia') }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                        {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Direccion</label>
                        <input type="text" class="form-control form-control-sm" id="inputDireccion" name="direccion" value="{{ old('direccion') }}" required data-parsley-pattern="/(^[A-Za-z0-9 ]+$)+/" data-parsley-length="[5, 40]" data-parsley-trigger="keyup"  />
                        {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Telefono</label>
                        <input type="text" class="form-control form-control-sm" id="inputTelefono" name="telefono" value="{{ old('telefono') }}" required data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="digits" data-parsley-trigger="keyup" />
                        {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Fecha de nacimiento</label>
                        <input type="date" class="form-control form-control-sm" id="inputDireccion" name="fechaDeNacimiento" value="{{ old('fechaDeNacimiento') }}"  data-parsley-required  data-parsley-trigger="keyup"  />
                        {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Tipo de Sangre</label>
                            <select id="inputParentesco" class="form-control form-control-sm" title="este dato sera utilizado con fines informativos ante una entidad de salud en caso de un eventual accidente y o catastrofe natural"   name="id_factorRH" required data-parsley-required data-parsley-trigger="keyup" >
                                <option value="" selected></option>
                                @foreach ($factorrhh as $factorrh =>$Factor)
                                    <option value="{{ $factorrh }}" {{ old('id_factorRH') }} > {{$Factor }} </option>
                                    {!!$errors->first('id_factorRH','<span class=error>:message</span>')!!}
                                @endforeach
                            </select>
                    </div>
                
                            
                            

                    <div class="form-group ">
                        <label class="asterisko">Email</label>
                        <input type="email" class="form-control form-control-sm" id="inputEmail" name="email" value="{{ old('email') }}" required data-parsley-type="email" data-parsley-maxlength="50" data-parsley-trigger="keyup"  />
                        {!!$errors->first('email','<span class=error>:message</span>')!!}  
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Eps</label>
                            <select  class="eps js-states form-control"  name="id_eps" required data-parsley-required data-parsley-trigger="keyup">
                                <option value="" selected></option>
                                @foreach ($epss  as $eps => $EPS)
                                    <option value="{{ $eps }}" {{ old('id_eps') }} > {{$EPS }} </option>
                                    {!!$errors->first('EPS','<span class=error>:message</span>')!!}
                                @endforeach
                            </select>
                            <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.eps').select2();
                                $("#mySelect").select2();

                                $(".eps").select2({
                                theme: "classic",							  
                                });
                                

                                });
                            </script>
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Lugar de nacimiento</label>
                            <select id="mySelect" class="variable js-states form-control"  name="id_lugarDeNacimiento" required data-parsley-required data-parsley-trigger="keyup">
                                <option value="" selected></option>
                                @foreach ($lugarDeNacimientoo  as $lugarDeNacimiento => $Lugar)
                                    <option value="{{ $lugarDeNacimiento }}" {{ old('id_lugarDeNacimiento') }} > {{$Lugar }} </option>
                                    {!!$errors->first('lugarDeNacimiento','<span class=error>:message</span>')!!}
                                @endforeach
                            </select>
                            <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.variable').select2();
                                $("#mySelect").select2();

                                $(".variable").select2({
                                maximumSelectionLength: 2,
                                theme: "classic"							  
                                });
                                

                                });
                            </script>
                    </div>
                    <div class="form-group ">
                        
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success btn-sm btn-block  ">Siguiente</button> 
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="form-row">
             <!-- inputs en horizontal    -->
            </div>


            <div class="form-row">
            </div>

            
        </form>
      </div>
      </div>
     </div>
</div>

@endsection