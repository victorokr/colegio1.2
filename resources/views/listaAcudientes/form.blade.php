           
            
                <div class="form-group">
                    <label class="asterisko">Nombres</label>
                    <input type="text" class="form-control" id="inputNombres" name="nombres" value="{{ $listaAcudientes->nombres }}" placeholder="Ingresa tus nombres"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Apellidos</label>
                    <input type="text" class="form-control" id="inputApellidos" name="apellidos" value="{{ $listaAcudientes->apellidos }}" placeholder="Ingresa tus apellidos"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('apellidos','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Documento</label>
                    <input type="text" class="form-control" id="inputDocumento" name="documento" value="{{ $listaAcudientes->documento }}" placeholder="Ingresa el numero"required data-parsley-length="[8, 10]" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('documento','<span class=error>:message</span>')!!}
                </div>
                
                
                <div class="form-group ">
                        <label class="asterisko">Tipo de Documento</label>
                        <select id="inputPerfil" class="form-control" name="id_tipoDocumento"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($tipoDeDocumentoo as $tipo => $Tipo)
                                <option value="{{ $tipo }}" {{ old('id_tipoDocumento', $listaAcudientes->id_tipoDocumento)== $tipo ? 'selected':'' }} > {{$Tipo }} </option>
                                {!!$errors->first('id_tipoDocumento','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Lugar de Residencia</label>
                    <input type="text" class="form-control" id="inputlugarDeResidencia" name="lugarDeResidencia" value="{{ $listaAcudientes->lugarDeResidencia }}" placeholder="ingresa el lugar de residencia"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Direccion</label>
                    <input type="text" class="form-control" id="inputDireccion" name="direccion" value="{{ $listaAcudientes->direccion }}" placeholder="Ingresa la direccion de residencia"required data-parsley-pattern="/(^[A-Za-z0-9 ]+$)+/" data-parsley-length="[5, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Telefono</label>
                    <input type="text" class="form-control" id="inputTelefono" name="telefono" value="{{ $listaAcudientes->telefono }}" placeholder="Ingresa el numero de telefono"required data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Parentesco</label>
                        <select id="inputParentesco" class="form-control" name="id_parentesco" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($parentescoo as $parentesco =>$Parentesco)
                                <option value="{{ $parentesco }}" {{ old('id_parentesco', $listaAcudientes->id_parentesco)== $parentesco ? 'selected':'' }} > {{$Parentesco }} </option>
                                {!!$errors->first('id_parentesco','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $listaAcudientes->email }}" placeholder="Ingresa tu email"required data-parsley-type="email" data-parsley-maxlength="50" data-parsley-trigger="keyup"  />
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>
                <div class="form-group ">
                    <label class="asterisko">Ocupacion</label>
                        <select id="mySelect" class="ocupacion js-states form-control"  multiple="multiple" name="ocupacion[]"required data-parsley-required data-parsley-trigger="keyup">
                        
                            @foreach ($ocupacionn  as $ocupacion => $Ocupacion)
                                <option value="{{ $ocupacion }}" {{ $listaAcudientes->ocupacion->pluck('id_ocupacion')->contains($ocupacion) ? 'selected':'' }} > {{$Ocupacion }} </option>
                                {!!$errors->first('ocupacion','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
				  		  	$(document).ready(function() {

    						$('.ocupacion').select2();
                            $("#mySelect").select2();

    						$(".ocupacion").select2({
                            maximumSelectionLength: 2,
                            theme: "classic"							  
                            });
                            

							});
				  		  </script>
                </div>
                <div class="form-group ">
                    <label class="">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Min 8 caracteres, 1 mayuscula, 1 numero" data-parsley-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/" data-parsley-minlength="8" data-parsley-trigger="keyup" />
                    {!!$errors->first('password','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  value="{{ old('password') }}" placeholder="Min 8 caracteres, 1 mayuscula, 1 numero" data-parsley-equalto="#password" data-parsley-trigger="keyup" />
                    {!!$errors->first('password_confirmation','<span class=error>:message</span>')!!}  
                </div>
            
                <button type="submit" class="btn btn-success btn-sm btn-block">Actualizar acudiente</button> 
        