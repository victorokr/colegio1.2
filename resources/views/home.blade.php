@extends('layouts.app')

@section('content')

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-interval="4000" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/inicio.jpg" class="d-block w-100" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>SoftCode</h5>
          <p>Desarrolla tus nesecidades</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/lego.jpg" class="d-block w-100" alt="second slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Desarrolla tus nesecidades</h5>
          <p>Desarrollamos de acuerdo a tus nesecidades</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/mundo.jpg" class="d-block w-100" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Era Digital</h5>
          <p>El mundo en tus manos</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container ">
 <div class="row justify-content-md-center">
  <div class="col col-lg-8">	
   <div class="card-group ">
	  <div class="card card border-light ">
	    <div class="card-body">
	      <h5 class="card-title">QUIENES SOMOS</h5>
	      <p class="card-text ">SoftCode. somos un equipo humano joven de profesionales, ingenieros y tecnólogos con la mejor actitud de participación en proyectos empresariales y con los mejores ánimos de afrontar las necesidades que la nueva tecnología requiere.  
          Prestamos nuestros servicios en el área de informática para empresas dando solución a sus inconvenientes a la mayor brevedad posible.
</p>
	      
	    </div>
	  </div>
	  <div class="card card border-light ">
	    <img src="images/sistema1.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title"></h5>
	      <p class="card-text"></p>
	    </div>
	  </div>
   </div>
  </div>
 </div>

  <div class="card-deck">
	  <div class="card ">
	    <img src="images/logoCol.png" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">aplicacion AKPI (ejemplo nombre de la aplicacion)</h5>
	      <p class="card-text">Aplicacion diseñada para llevar el control de las notas</p>
	      <p class="card-text"><small class="text-muted"></small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/totalmenteweb.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Sistema Totalmente Web</h5>
	      <p class="card-text">AKPI es una herramienta totalmente web brinda para su institución un programa para tener control de los diferentes campos de acción haciéndolos más eficientes y eficaces en cada proceso donde se evidenciara un registro académico, control administrativo, dirección, coordinación, cuerpo docente,alumnos y padres de familia.</p>
	      <p class="card-text"><small class="text-muted"></small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/registroacademico.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Registro Académico</h5>
	      <p class="card-text">
          con la plataforma AKPI, podrán  llevar un registro académico ajustandose a las necesidades de la institución, integrando las nuevas tecnologías para gestionar los procesos académicos donde se podrá realizar el registro y seguimiento de notas de los alumnos y de esta forma integrar los informes académicos de manera bimestral o trimestral</p>
	      <p class="card-text"><small class="text-muted"></small></p>
	    </div>
	  </div>
  </div>

  <div class="card-deck mt-4">
	  <div class="card ">
	    <img src="images/flujodeinformacion.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Flujo de Información Total</h5>
	      <p class="card-text">Con AKPI tendrás un flujo de información completa entre toda la comunidad educativa (cuerpo docente, padres de familia, alumnos, administrativas y directivas ) permitiendo agilizar y comunicar los diferentes procesos convivenciales y académicos</p>
	      <p class="card-text"><small class="text-muted"></small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/institucionweb.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Institución Educativa en la Web</h5>
	      <p class="card-text">
           La comunidad educativa siempre encontrará la plataforma disponible.
           Teniendo un espacio privado para la institución. Garantizando un excelente funcionamiento y actualización del sistema y de la información.</p>
	      <p class="card-text"><small class="text-muted"></small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/administrador.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Administrador de la Plataforma</h5>
	      <p class="card-text">El administrador de la plataforma tendra el control absoluto de la aplicacion pudiendo obtener datos estadisticos, reportes y notas de los alumnos. y todo en tiempo real.</p>
	      <p class="card-text"><small class="text-muted"></small></p>
	    </div>
	  </div>
  </div>
</div>
@endsection
