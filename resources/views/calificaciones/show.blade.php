

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

        html {
            margin: 0;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 13px;
            margin: 35mm 4mm 8mm 4mm;
            background-color: #F3F3F6;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 7em;
            background-color: #E2F8F6;
            color: white;
            text-align: center;
            line-height: 1em;
            border-radious: 35px 0px 35px 0px; 
            border: 5px solid #DAE1E9;
            color: black;
            padding: 1em;
            overflow: hidden;
            
        }

       

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            background-color: #E2F8F6;
            color: black;
            text-align: center;
            line-height: 15px;
        }

        /* .cuadroHeader {
            
            position: absolute;
            left: 3em;
            top:  3em;
            text-align: center;
            background-color: #E2F8F6;

           
            font-size: 1em; 
            width: 55em;
            height: 6em;
           
            padding: 1em;
            overflow: hidden;

            line-height: 1em;
            border-radious: 35px 0px 35px 0px; 
            border: 5px solid #DAE1E9;
         } */
         .cuadroHeader2 .logoCol {
            position: absolute;
            left: 63em;
            top:  0em;
            /* background-color: #AEAEFC; */
            width: 7em;
            height: 9em;
           
            /* padding: 20px; */
         }
        
        .table{
            /* permite ewl salto de pagina de la tabla  position relative*/
            position: relative;
            width: 100%;
            /* border:2px solid #999999; */
            border-collapse: collapse;
            /* left: 3em; */
            /* top:  12em; */
            /* margin-top: 2em; */
            /* width: 65em; */
            /* height: 100%; */
        }

        .table td , .table th{
            border: 1px solid #ddd;
            padding: 8px;
           
        }


        .table tr:nth-child(even){
            background-color: #f2f2f2;
        }

        .table  tr:hover {
            background-color: #ddd;
        }



        .page-break {
            page-break-after: always;
          
         }

         /* .page-break, td {
            page-break-before: always;
          
         } */
        

         /* cuerpo y cuadros tabla */
         .table th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            /* color verde encabezado tabla */
            background-color: #04AA6D;
            color: white;
        }

        . li{
            border: 1px solid #ddd;
            /* position: absolute; */
            /* width: 100%; */
            /* border:2px solid #999999;
            padding: 8px;
            word-break: all; */
            /* text-aling: left; */
            /* left: 30px;
            top:  300px;
            width: 500px;
            height: 200px; */
        }

        /* lista sin viñetas */
        .table ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

       
        
         
    </style>
    
</head>


<body>
  <header>
                       
        Colegio de Pruebas y Demostración
                            
        Para la Plataforma de Notas Cisne
        CISNEPRUEBAS
        <br>
            Ciencia Virtud Disciplina
        <br>
            Código Dane: 8000265844 - Resolucion: 987256 del 23 de Febrero de 2010
            Calle 15 Nro 10 - 61 Cel: 312 328 97 79 - TelFax: 098 7627306
        <br>
            Informe de Evaluación - Periodo: {{$calificacionIdAlumno->id_periodo}} - Año: {{ $calificacionIdAlumno->created_at->year }}
        <br>
            Curso: {{($calificacionIdAlumno->curso)->salon}}
        <br>
            Alumno@: {{($calificacionIdAlumno->alumno)->nombres}}

        <div class="cuadroHeader2">
            <img class="logoCol" src="images/logoColDePrueba.png">
        </div>
  
  </header>


  
    
    <!-- <div class="nombreAlumno">
       {{($calificacionIdAlumno->alumno)->nombres}}
    </div>     -->
    <table class="table page-break">
               
                <tr>
                <!-- <th>alumno            </th> -->
                <!-- <th>docente</th> -->
                <th>Asignatura</th>
                <th>Indicador de logro</th>
                <th>Nota</th>
                <th>Juicio</th>
                <th>Prom</th>
                <!-- <th>L4</th>
                <th>L5</th>
                <th>L6</th> -->
                <!-- <th>prom</th>  -->
                <!-- <th>curso</th>
                <th>peri</th> -->
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
                    @foreach($listaCalificacioPdf  as $listaCalificacion )

                      
                     
                    <tr>
                    <!-- <td>{{ optional($listaCalificacion->alumno)    ->nombres }} </td> -->
                    <!-- <td>{{ optional($listaCalificacion->docente)   ->nombres }} </td> -->
                    <td>{{ optional($listaCalificacion->asignatura)->asignatura }} </td>
                    <!-- iterar modelo asignatura y de alguna manera pasarle esta asignatura aqui arriba -->
                    <!-- probar con la relacion inversa del modelo asignatura -->

                    <td>
                        <ul>
                            <li>{{ optional($listaCalificacion->logro)->logro1 }}</li>
                            <li>{{ optional($listaCalificacion->logro)->logro2 }}</li>
                            <li>{{ optional($listaCalificacion->logro)->logro3 }}</li>
                            <li>{{ optional($listaCalificacion->logro)->logro4 }}</li>
                            <!-- <li>{{ optional($listaCalificacion->logro)->logro5 }}</li>
                            <li>{{ optional($listaCalificacion->logro)->logro6 }}</li> -->
                        </ul> 
                    </td>

                    <td>
                        <ul>
                            <li>{{ $listaCalificacion->nota1 }} </li>
                            <li>{{ $listaCalificacion->nota2 }} </li>
                            <li>{{ $listaCalificacion->nota3 }} </li>
                            <li>{{ $listaCalificacion->nota4 }} </li>
                            <!-- <li>{{ $listaCalificacion->nota5 }} </li>   
                            <li>{{ $listaCalificacion->nota6 }} </li> -->
                            
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @php($filterOnlyNotes = $listaCalificacion->only(['nota1','nota2','nota3','nota4']))
                                    @foreach($filterOnlyNotes as $value)
                                        @if($value >= 3) 
                                            <li>si</li>
                                        @else
                                            <li>no</li> 
                                        @endif
                                    @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>{{ $listaCalificacion->promedio }}</li>
                        </ul>
                    </td>
                    <!-- <td>{{ $listaCalificacion->promedio }} </td> -->
                    <!-- <td>{{ optional($listaCalificacion->curso)     ->salon }} </td>
                    <td>{{ optional($listaCalificacion->periodo)   ->id_periodo }} </td> -->
                    
                    </tr>





                    @endforeach

                   




                    <tr>
                   
                    </tr>
               
            
    </table>
  <footer>
    <h3>Boletin de notas</h3>
  </footer> 

  
</body>
</html>
   


   

