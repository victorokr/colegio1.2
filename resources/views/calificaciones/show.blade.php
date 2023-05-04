

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
            /* margenes todo el documento */
            /* primero=arriba, segundo=lado derecho, tercero=abajo, cuarto=lado izquierdo */
            margin: 0.1cm 1.5cm 0.1cm 0.2cm;
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
            left: 0.4cm;
            right: 0.4cm;
            height: 5em;
            background-color: #ffffff;
            border-radious: 35px 0px 35px 0px;
            border: 5px solid #DAE1E9;
            color: black;
            padding: 0em;
            text-align: center;
            line-height: 1em;
            overflow: hidden;
        }

      
        
        .table{
            /* permite ewl salto de pagina de la tabla  position relative*/
            position: relative;
            width: 100%;
            /* border:2px solid #999999; */
            border-collapse: collapse;
            /* border: 1px solid #ddd; */
            /* left: 3em; */
            /* top:  12em; */
            /* margin-top: 2em; */
            /* width: 65em; */
            /* height: 100%; */
        }

        .table td , .table th {
            border: 1px solid #ddd;
            padding: 8px;
             
        }

       


        /* .table tr:nth-child(even){
            background-color: #f2f2f2;
           
        } */

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
            /* border: 1px solid #ddd; */
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
        .observaciones{
           
           /* padding: 6px;  */
           /* padding: 28.5px; */
           /* padding-top: 50px; */
           /* padding-right: 56px;
           padding-left: 52px; */
           /* margin-top: 5em; */
           margin-left: 1em;
           border-top: 1px solid #ddd;
           
           /* float: left;  */
       }

        .container{
            position: relative;
            text-align: center;
        }

         .firmaDirector{
           
             /* padding: 6px;  */
             padding: 0px;
            padding-top: 0px;
            margin-top: 5px;
            margin-left: -175px;
            margin-right: 0px;
            /* padding-right: 50px; */
            padding-left: 0px;
            /* margin-top: 5em; */
            position: relative;
            /* border: 1px solid #808080; */
            border-radius: 1px 1px;
            /* border-top: 1px solid; */
            
            float: left; 
        }
        .firmaRector{
           
            /* padding: 6px;  */
            padding: 0px;
            padding-top: 0px;
            margin-top: 5px;
            margin-left: 0px;
            margin-right: 0px;
            padding-right: 0px;
            /* padding-left: 50px; */
            /* margin-top: 5em; */
            position: relative;
            /* border: 1px solid #808080; */
            border-radius: 1px 1px;
            /* border-top: 1px solid; */
            
            float: left; 
        }

        .textoFirma{
           
           /* padding: 6px;  */
           padding: 0px;
           padding-top: 38px;
           top: -5px;
           padding-right: 0px;
           margin-top: 0em;
           margin-left: 0px;
           /* padding-right: 50px;
           padding-left: 50px; */
           /* margin-top: 5em; */
           width: 15em;
           height: 1em;
           position: absolute;
           border: 1px solid #808080;
           border-radius: 1px 1px;
           /* border-top: 1px solid; */
           
           float: left; 
       }

        .nombreFirmaDirector{
            /* border: 1px solid #808080;
            border-radius: 1px 1px; */
            padding: 0px; 
            padding-top: 0px;
            buttom: 0px;
            margin-top: 10px;
            position: absolute;

            /* centra el nombre */
            width: 15em;
            height: 15em;
            margin-buttom: 0px;
            margin-left: 0px;
           
            font: italic bold 10px/22px Georgia, serif;
            /* font:italic small-caps bold 12px/30px Georgia, serif ; */
            float:left;
      
        }

        .imagenFirmaRector{
            /* border: 1px solid #808080;
            border-radius: 1px 1px; */
            padding: 0px; 
            padding-top: 0px;
            buttom: 0px;
            margin-top: -35px;
            position: absolute;
            width: 15em;
            height: 15em;
            margin-buttom: 0px;
            margin-left: 25px;
            
            float:left;
      
        }

    

        
        .notaF{
         
         margin-right: 0em; 
         padding-bottom: 0px;
         /* margin-top: 20px; */
         border: 1px solid #808080;
         border-radius: 1px 1px;
         padding: 18.5px;
         float: right; 
       }
        .promocion{
         
         margin-right: 0em; 
         padding-bottom: 0px;
         /* margin-top: 20px; */
         border: 1px solid #808080;
         border-radius: 1px 1px;
         padding: 5px;
         float: right; 
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


        .table{
            /* background: rgba(0, 0, 0, 0.1); */
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.1;
            background-image: url("images/fondoboletin.png");
            
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
                  <div class="col">      
                    <div class="div11"> Director(a) de curso: {{ ($calificacionIdAlumno->curso->docente)->nombres}}</div>
                  </div>
                  <div class="col">      
                    <div class="div11">  Boletin de Notas </div>
                  </div>
                  

                </div>   
                
                      

         </div>        



   <main>
    <div class="page-break">
      <table class="table ">
               
                <tr>
                    <!-- <th>alumno            </th> -->
                    <!-- <th>docente</th> -->
                    <th>Asignatura</th>
                    <th>Indicador de logro</th>
                    <th>Observación</th>
                    <th>Calificación</th>
                    <th>Juicio</th>
                   
                    <th>P1</th>
                    <th>P2</th>
                    <th>P3</th>
                    <th>P4</th>
                    <th>PF</th>
            
                </tr>
                
               
            
               
                
                   
                    @php($count = 0)
                  
                    @foreach($listaCalificacioPdf  as $listaCalificacion)

                         
                   
                    <tr>
                        <!-- <td>{{ optional($listaCalificacion->alumno)    ->nombres }} </td> -->
                        <!-- <td>{{ optional($listaCalificacion->docente)   ->nombres }} </td> -->
                        <td>{{ optional($listaCalificacion->asignatura)->asignatura }} </td>
                    

                        <td>
                            <ul>
                                <li>1-{{ optional($listaCalificacion->logro)->logro1 }}</li>
                                <li>2-{{ optional($listaCalificacion->logro)->logro2 }}</li>
                                <li>3-{{ optional($listaCalificacion->logro)->logro3 }}</li>
                                <li>4-{{ optional($listaCalificacion->logro)->logro4 }}</li>
                                <!-- <li>{{ optional($listaCalificacion->logro)->logro5 }}</li>
                                <li>{{ optional($listaCalificacion->logro)->logro6 }}</li> -->
                            </ul> 
                        </td>
                        <td>{{ optional($listaCalificacion->observacion)->observaciones }}</td>
                        <td>
                            <ul>
                                <li>(L1) {{ $listaCalificacion->nota1 }} </li>
                                <li>(L2) {{ $listaCalificacion->nota2 }} </li>
                                <li>(L3) {{ $listaCalificacion->nota3 }} </li>
                                <li>(L4) {{ $listaCalificacion->nota4 }} </li>
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

                        
                        <td>{{ optional($listaCalificacion->promedio)->promediop1 }}</td>
                        <td>{{ optional($listaCalificacion->promedio)->promediop2 }}</td>
                        <td>{{ optional($listaCalificacion->promedio)->promediop3 }}</td>
                        <td>{{ optional($listaCalificacion->promedio)->promediop4 }}</td>
                        @php($numeroFormateado = bcdiv(($listaCalificacion->promedio)->promediototal,'1','1'))
                        @if($calificacionIdAlumno->id_periodo == 4)
                        <td>{{ $numeroFormateado }}</td>
                        @else
                        <td></td>
                        @endif
                       

                        @php($promedioAñoTodasLasMaterias[] = $numeroFormateado)
                      
                    
                    </tr>
                  
                    @endforeach
                  
                   
                    
                    



                        
                            <div class="row observaciones">
                                <div class="col">
                                    <h4>observación general:</h4>
                                </div>
                            </div>
                        
                           
                    
                        
                        @php($countColum = count($promedioAñoTodasLasMaterias))
                        @php($calcularPromedio = array_sum($promedioAñoTodasLasMaterias)/$countColum)
                        @php($numeroFormateado = bcdiv($calcularPromedio, '1','1'))
                       
                        
                    
               
            
      </table>
    </div>
   </main>
    
   <footer>
        <div class="container">
            <div class="row">
                <div class="col firmaRector">
                    <div><img class="imagenFirmaRector" src="images/rector3.png"></div>
                    <div class="textoFirma">   Director(a) colegio</div>    
                </div>
                <div class="col firmaDirector"> 
                    <div class="nombreFirmaDirector">{{ ($calificacionIdAlumno->curso->docente)->nombres}}</div>
                    <div class="textoFirma">  Director(a) de grupo</div>
                </div>
                
                
              
                
        
                @php($sumagrado = ($calificacionIdAlumno->grado)->id_grado)
                @if($calificacionIdAlumno->id_periodo == 4 || $calificacionIdAlumno->id_grado == 11)
                        <div class="col">
                            <div class="promocion"><h4>El alumno(@): {{($calificacionIdAlumno->alumno)->nombres}}. {{ ($numeroFormateado >= 3)? "Aprobó el año lectivo y culminó sus estudios satisfactoriamente" : "No aprobó el año lectivo"}} </h4></div>
                        </div>   
                        <div class="col">      
                            <div class="notaF">Nota Final: {{ $numeroFormateado }}</div>
                        </div>
                @else  
                    @if($calificacionIdAlumno->id_periodo == 4)
                        <div class="col">
                            <div class="promocion"><h4>El alumno(@): {{($calificacionIdAlumno->alumno)->nombres}}. {{ ($numeroFormateado >= 3)? "Es" : "No es"}} promovido(a) al grado {{ $sumagrado+1 }}</h4></div>
                        </div>
                        <div class="col">      
                            <div class="notaF">Nota Final: {{ $numeroFormateado }}</div>
                        </div>  
                    @else

                    @endif
                @endif

            </div>   
        </div>
   </footer>
  
</body>
</html>
   


   

