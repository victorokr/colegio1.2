

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    


    
    <style>

        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 1cm 0cm 0cm;
            background-color: #F3F3F6
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        .cuadroHeader {
            position: absolute;
            left: 1cm;
            top:  1cm;
            text-align: center;
            background-color: #E2F8F6;
            font-size: 15px;
            width: 638px;
            height: 130px;
            margin-top: 1px;
         }
         .cuadroHeader2 .logoCol {
            position: absolute;
            left: 18cm;
            top:  1cm;
            /* background-color: #AEAEFC; */
            width: 100px;
            height: 130px;
            margin-top: 1px;
         }
        
        .table{
            position: absolute;
            /* width: 100%; */
            border:2px solid #999999;
            left: 30px;
            top:  180px;
            width: 750px;
            height: 200px;
        }
        .page-break {
            page-break-after: always;
          
         }

         .page-break, td {
            page-break-before: always;
          
         }
        

         /* cuerpo y cuadros tabla */
         . th{
            /* position: absolute; */
            /* width: 100%; */
            border:2px solid #999999;
            padding: 8px;
            word-break: all;
            
            /* left: 30px;
            top:  300px;
            width: 500px;
            height: 200px; */
        }

        . td{
            /* position: absolute; */
            /* width: 100%; */
            border:2px solid #999999;
            padding: 8px;
            word-break: all;
            
            /* left: 30px;
            top:  300px;
            width: 500px;
            height: 200px; */
        }
        
         
    </style>
    
</head>


<body>
  <header>
    <h3>Boletin de Notas</h3>
  </header>


  <div class="cuadroHeader">                     
    Colegio de Pruebas y Demostración
                        
    Para la Plataforma de Notas Cisne
    CISNEPRUEBAS
    <br>
        Ciencia Virtud Disciplina
    <br>
        Código Dane: 8000265844 - Resolucion: 987256 del 23 de Febrero de 2010
        Calle 15 Nro 10 - 61 Cel: 312 328 97 79 - TelFax: 098 7627306
    <br>
        Informe de Evaluación - Periodo: {{$calificacionIdAlumno->id_periodo}} - Año: {{ Carbon\Carbon::now()->year }}
    <br>
         Curso: {{($calificacionIdAlumno->curso)->salon}}
    <br>
        Nombre: {{($calificacionIdAlumno->alumno)->nombres}}

  </div>
    <div class="cuadroHeader2">
        <img class="logoCol" src="images/logoColDePrueba.png">
    </div>
    <!-- <div class="nombreAlumno">
       {{($calificacionIdAlumno->alumno)->nombres}}
    </div>     -->
    <table class="table page-break">
               
                <tr>
                <th>alumno            </th>
                <th>docente            </th>
                <th>asignatura</th>
               
                <th>L1</th>
                <th>L2</th>
                <th>L3</th>
                <th>L4</th>
                <th>L5</th>
                <th>L6</th>
                <th>prom</th> 
                <th>curso</th>
                <th>peri</th>
                </tr>
                
            
            
               <!-- <tr>
                    <td>
                        {{($calificacionIdAlumno->alumno)->nombres}}
                    </td>
               </tr> -->
                    <!-- <td>
                        {{$calificacionIdAlumno->promedio}}
                    </td> -->

                   
                    <!-- pasar whereIn('id',[1,2,3]) -->
                    @foreach($listaCalificacioPdf->where('id_alumno','=',$calificacionIdAlumno->id_alumno )
                        ->where('id_periodo','=',$calificacionIdAlumno->id_periodo) as $listaCalificacion)
                    <tr>
                    <td>{{ optional($listaCalificacion->alumno)    ->nombres }} </td>
                    <td>{{ optional($listaCalificacion->docente)   ->nombres }} </td>
                    <td>{{ optional($listaCalificacion->asignatura)->asignatura }} </td>
                    <!-- iterar modelo asignatura y de alguna manera pasarle esta asignatura aqui arriba -->
                    <!-- probar con la relacion inversa del modelo asignatura -->
                    
                    <td>{{ $listaCalificacion->nota1 }} </td>
                    <td>{{ $listaCalificacion->nota2 }} </td>
                    <td>{{ $listaCalificacion->nota3 }} </td>
                    <td>{{ $listaCalificacion->nota4 }} </td>
                    <td>{{ $listaCalificacion->nota5 }} </td>
                    <td>{{ $listaCalificacion->nota6 }} </td>
                    <td>{{ $listaCalificacion->promedio }} </td>
                    <td>{{ optional($listaCalificacion->curso)     ->salon }} </td>
                    <td>{{ optional($listaCalificacion->periodo)   ->id_periodo }} </td>
                    
                    </tr>

                    @endforeach






                    <tr>
                    @foreach($listaAsignatura->where('id_asignatura','=',$listaCalificacion->id_asignatura ) as $listaLogros)
                         <td>{{ $listaLogros->logros }} </td> 
                         
                    @endforeach
                    </tr>
               
            
    </table>
  <footer>
    <h3>Cisne</h3>
  </footer> 

  
</body>
</html>
   


   

