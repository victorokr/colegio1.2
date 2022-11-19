{!!csrf_field() !!}
        <h6 class="card-title text-center"><p class="card-text"><small class="text-muted ">Todos los campos son obligatorios</small></p></h6>
            <div class="row justify-content-center ">
              <div class=" col-sm-4 mt-4">   
                <div class="form-group">
                    <label for="label inputEmail4">Nombres</label>
                    <input type="text" class="form-control form-control-sm" id="inputNombres" name="nombres" value="{{ old('nombres') }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Apellidos</label>
                    <input type="text" class="form-control form-control-sm mb-3" id="inputApellidos" name="apellidos" value="{{ old('apellidos') }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('apellidos','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group">
                    <label for="inputDocumento">Documento</label>
                    <input type="text" class="form-control form-control-sm" id="inputDocumento" name="documento" value="{{ old('documento') }}" required data-parsley-length="[10, 10]" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('documento','<span class=error>:message</span>')!!}
                </div>
                
                <div class="form-group ">
                    <label for="inputAddress">Lugar de Residencia</label>
                    <input type="text" class="form-control form-control-sm" id="inputlugarDeResidencia" name="lugarDeResidencia" value="{{ old('lugarDeResidencia') }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label for="inputCity">Direccion</label>
                    <input type="text" class="form-control form-control-sm" id="inputDireccion" name="direccion" value="{{ old('direccion') }}" required data-parsley-pattern="/(^[A-Za-z0-9 ]+$)+/" data-parsley-length="[5, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label for="inputTelefono">Telefono</label>
                    <input type="text" class="form-control form-control-sm" id="inputTelefono" name="telefono" value="{{ old('telefono') }}" required data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label for="inputCity">Fecha de nacimiento</label>
                    <input type="date" class="form-control form-control-sm" id="inputDireccion" name="fechaDeNacimiento" value="{{ old('fechaDeNacimiento') }}"  data-parsley-required  data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label for="inputCity">Tipo de Sangre</label>
                        <select id="inputParentesco" class="form-control form-control-sm" title="este dato sera utilizado con fines informativos ante una entidad de salud en caso de un eventual accidente y o catastrofe natural"   name="id_factorRH" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected></option>
                            @foreach ($factorrhh as $factorrh =>$Factor)
                                <option value="{{ $factorrh }}" {{ old('id_factorRH', $listaAlumnos->id_factorRH)== $factorrh ? 'selected':'' }} > {{$Factor }} </option>
                                {!!$errors->first('id_factorRH','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
               
                        
                        

                <div class="form-group ">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control form-control-sm" id="inputEmail" name="email" value="{{ old('email') }}" required data-parsley-type="email" data-parsley-maxlength="50" data-parsley-trigger="keyup"  />
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>
                <div class="form-group ">
                    <label for="inputEPS">Eps</label>
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
                    <label for="inputAreaDeEstudio">Lugar de nacimiento</label>
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
                    <label for="inputEPS">Grado al que ingresa</label>
                        <select  class="grado js-states form-control"  name="id_grado" required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected></option>
                            @foreach ($gradoo  as $grado => $Grado)
                                <option value="{{ $grado }}" {{ old('id_grado') }} > {{$Grado }} </option>
                                {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
				  		  	$(document).ready(function() {

    						$('.grado').select2();
                            $("#mySelect").select2();

    						$(".grado").select2({
                            theme: "classic",							  
                            });
                            

							});
				  		  </script>
                </div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-success btn-sm btn-block  ">Siguiente</button> 
                </div>
