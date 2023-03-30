

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    


    
    <style>
   /* ----------------------responsive css----------------------------- */
        * {
        box-sizing: border-box;
        }

        .row::after {
            content: "";
            clear: both;
            display: block;
            }


            [class*="col-"] {
            float: left;
            padding: 15px;
            }

            /* For desktop: */
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}

            @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            [class*="col-"] {
                width: 100%;
            }
            }
   /* ------------------------------------------------------- */
        @media print{
          

        }

        @page {
            /* margin: 35mm 4em 8em 4em; */
            
            /* margin: 0cm 0cm; */
            /* font-family: Arial; */
            }


            /* @page:first {
                margin: 0cm;
            }
            @page:last {
                margin: 5cm;
            }
            @page:left {
                margin: 2cm 1.5cm 2cm 2cm;
            }
            @page:right {
                margin: 2cm 2cm 2cm 1.5cm;
            } */


        html {
            /* margin: 0; */

            /* primero=arriba, segundo=lado derecho, tercero=abajo, cuarto=lado izquierdo */
            margin: 0.2cm 0.2cm 0.1cm 1.8cm;
            font-family: verdana;

        }

        /* maneja las margenes del body */
        body {
            font-family: verdana;
            /* font-family: "Times New Roman", Times, serif; */
            font-size: 10px;
            margin: 27mm 4mm 6mm 4mm;
            background-color: #F3F3F6;


            
        }

        .header {
            position: fixed;
            top: 0cm;
            left: 0.4cm;
            right: 0.4cm;
            height: 9.5em;
            
            background-color: #ffffff;
            color: white;
            text-align: center;
            line-height: 1em;
            border-radious: 35px 0px 35px 0px; 
            border: 5px solid #DAE1E9;
            color: black;
            padding: 0em;
            overflow: hidden;
            /* margin: 0.1cm 1cm 0.1cm 2cm; */
        }

       
        /* se cambio de fixed a absolute para que el footer solo aparesca en la ultima pagina */
        footer {
            position: absolute;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 6em;
            background-color: #ffffff;
            border: 5px solid #DAE1E9;
            color: black;
            text-align: center;
            /* line-height: 15px; */
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
         /* .cuadroHeader2 .logoCol {
            position: absolute;
            left: 63em;
            top:  0em;
           
            width: 7em;
            height: 9em;
           
            
         } */
        
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
            page-break-after: auto;
            
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

        /* pone una linea inferior, subraya */
        . li{
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-bottom-color: #A0A0A0;
            /* border-style: dotted; */
            /* border: 1px solid #ddd; */

        }

        /* lista sin viñetas */
        .table ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* informacion colegio y alumno */
        /* .cuadro{
            border: 2px solid #DAE1E9;
            margin: 0;
            padding: 0px;
            width: 80%;
            height: 105px;
            margin-left: 5em;
            border-radius: 1px 1px;
            
        } */

        .div1{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            /* display: inline-block; */
            
        }
        .div3{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
             
        }
        .div4{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            /* z-index: -1;  */
        }
        /* .div5{
            border: 1px solid #202020;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
             
        } */
        .div6{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            float: left; 
        }
        .div7{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            float: left;
        }
        .div8{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            float: left; 
        }
        .div9{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            float: left; 
        }
        .div10{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            float: left; 
        }
        .div11{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 6px; 
            padding-top: 6px;
            margin-top: 0px;
            
            float: left; 
        }
        .logoCol{
            border: 1px solid #808080;
            border-radius: 1px 1px;
            padding: 0px; 
            padding-top: 0px;
            margin-top: 0px;
            /* float: left;  */
            position: absolute;
            /* left: 63em;
            top:  0em; */
            /* background-color: #AEAEFC; */
            width: 7em;
            height: 9em;
            /* display: inline-block; */
            float:right;
            z-index: 90;
             
        }

        .csslogo{
            position: absolute;
            z-index: 1;
            float:right;
            margin-left: 0px;
        }
       
        
         
    </style>
    
</head>


<body>
  <!-- <header> -->
         <div class="header">

                <div class="row">
                  <div class="col csslogo"> 
                    <div class="div12"><img class="logoCol" src="images/logoColDePrueba.png"></div>
                  </div>
               
                  <div class="col"> 
                    <div class="div1">Colegio Gonzalo Arturo Reyes, Plataforma de Notas Cisne</div>               
                  </div>
                   
                  <div class="col"> 
                    <div class="div3">Ciencia Virtud Disciplina</div>
                  </div>
                  <div class="col">
                    <div class="div4">Código Dane: 8000265844 - Resolucion: 987256 del 23 de Febrero de 2010, Calle 15 Nro 10 - 61 Cel: 312 328 97 79 - TelFax: 098 7627306</div>
                  </div>
                  <div class="col"> 
                    <div class="div6">Informe de Evaluación: Periodo: {{$calificacionIdAlumno->id_periodo}}</div>
                  </div>
                  <div class="col">   
                    <div class="div7">Año: {{ $calificacionIdAlumno->created_at->year }}   </div>
                  </div>
                  <div class="col">                          
                    <div class="div8">Curso: {{($calificacionIdAlumno->curso)->salon}}</div>
                  </div> 
                  <div class="col">
                    <div class="div9"> Alumno@: {{($calificacionIdAlumno->alumno)->nombres}}</div>
                  </div>
                  <div class="col">      
                    <div class="div10"> Sede: {{ ($calificacionIdAlumno->curso->sede)->sede}}</div>
                  </div>
                  <div class="col">      
                    <div class="div11"> Jornada: {{ ($calificacionIdAlumno->curso->jornada)->jornada}}</div>
                  </div>
                  

                </div>   
                
                      

         </div>        

        
  
  <!-- </header> -->
  

  
    
    <!-- <div class="nombreAlumno">
       {{($calificacionIdAlumno->alumno)->nombres}}
    </div>     -->
   <main>
    <div class="page-break">
      <table class="table ">
               
                <tr>
                    <!-- <th>alumno            </th> -->
                    <!-- <th>docente</th> -->
                    <th>Asignatura</th>
                    <th>Indicador de logro</th>
                    <th>Nota</th>
                    <th>Juicio</th>
                    
                    <th>P1</th>
                    <th>P2</th>
                    <th>P3</th>
                    <th>P4</th>
                    <th>Total</th>
            
                </tr>
                
               
            
               
                
                   
                    <!-- pasar whereIn('id',[1,2,3]) -->
                    @foreach($listaCalificacioPdf  as $listaCalificacion)

                         
                   
                    <tr>
                    <!-- <td>{{ optional($listaCalificacion->alumno)    ->nombres }} </td> -->
                    <!-- <td>{{ optional($listaCalificacion->docente)   ->nombres }} </td> -->
                    <td>{{ optional($listaCalificacion->asignatura)->asignatura }} </td>
                 

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
                             
                           {{ $listaCalificacion->promedio }}  
                                    
                    </td>

                    <td>
                            
                    </td>

                    <td>
                        
                    </td>

                    <td>
                          
                    </td>

                    <td>
                        <ul>
                            <!-- <li>{{ $listaCalificacion->promedio }}</li> -->
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
    </div>
   </main>
    
   <footer>
       <div class="cuadrofooter">
            <div class="footerfirma">Director(a) de grupo</div>
       </div>
     <h3>Boletin de notas</h3>
   </footer>
  
</body>
</html>
   


   

