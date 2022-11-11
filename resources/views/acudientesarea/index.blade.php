@extends('layouts.app')

@section('content')

  <div class="row justify-content-center">
  	<div class="col-auto">
          

           

           

	</div>	
  </div>



    <div class="contenedorimg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-header"><small class="text-muted">Bienvenido</small></div>

                    <div class="card-body ">
                        <!-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ Auth::user()->nombres }}
                                {{ Auth::user()->apellidos }}
                            </div>
                        @endif -->
                        {{ Auth::user()->nombres }}
                        {{ Auth::user()->apellidos }} 
                    </div>
                </div>
            </div>
        </div>
  
    
        <div class="row justify-content-center">
            <div class="card-group  ">
                <div class="col-md-auto"> 
                    <div class="card  bg-light text-white" data-tippy-content="Consulta el estado de la matricula">
                        <img src="/images/estudiantes1.jpg" class="card-img-top" alt="...">
                        
                        <div class="card-footer">
                        <small><a href="{{ url('matricula') }}" class="text-muted stretched-link">Mis Matriculas</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">  
                    <div class="card" data-tippy-content="inicia el proceso de pre matricula del estudiante">
                        <img src="/images/prema.jpg" class="card-img-top" alt="...">
                        
                        <div class="card-footer card-tooltip">
                        <small><a href="{{ url('crear/alumnosmatricula/create') }}"   class="text-muted stretched-link"  >Pre Matricula</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto"> 
                    <div class="card" data-tippy-content="Consulta las calificaciones">
                        <img src="/images/calificacion.jpg" class="card-img-top" alt="...">
                        
                        <div class="card-footer">
                        <small><a href="#" class="text-muted stretched-link">Calificaciones</a></small>
                        </div>
                    </div>
                </div>
            </div>
            
           
    </div>

    

   

   

    <!-- <button type="button" id="btnsweet" class="btn btn-primary btn-sm">sweet</button> -->
    <script>
        $('#btnsweet').on('click',function() {

            

            // Swal.fire({
            // position: 'top-end',
            // icon: 'success',
            // title: 'Su registro fue exitoso coño. ',
            // text: "Para continuar con el proceso de matrícula, por favor diríjase con el recibo de pago a las instalaciones del colegio",
            // showConfirmButton: true,
            // timer: 10500,
            // timerProgressBar: 'true',
            //  })

             

            // const Toast = Swal.mixin({
            // toast: true,
            // position: 'top-end',
            // showConfirmButton: false,
            // timer: 10500,
            // timerProgressBar: true,
            // onOpen: (toast) => {
            //     toast.addEventListener('mouseenter', Swal.stopTimer)
            //     toast.addEventListener('mouseleave', Swal.resumeTimer)
            // }
            // })

            // Toast.fire({
            // icon: 'success',
            // title: 'Su registro fue exitoso.',
            // text: 'Para continuar con el proceso de matrícula, por favor diríjase con el recibo de pago a las instalaciones del colegio'
            // })

        });
    </script>


        <!-- Styles -->
        <!-- <style>
            html, body {
                background-color: #aaa;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
   
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->
 
   

@endsection