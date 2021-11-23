
<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Mesa de Ayuda">
    <meta name="author" content="Nicolás Diorio, Mackenson Fontalis">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/starter-template/">
    <title>Helpme</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="../css/estilos2.css" rel="stylesheet">
    <style>
      

    h5 { color: #f9f5f5; }
    </style>




  </head>

  <body>
      <div class="container">
        <header class="cabecera-principal">
            <div id=contenedor-cabecera>
              <img id="logo" src="../img/logo1.png" alt="Logo Responsive">
            </div>
            <nav  class="nav-principal">
              <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="#">Equipo</a></li>
                <li><a href="vistaServicios.php">Servicios</a></li>                                    
                <li aling=right class="cerrar-sesion">
                <a href="../includes/CerrarSesion.php">Cerrar Sesion</a> 
                </li>               
              </ul>
              
            </nav>
        </header>
      </div>
      
      <div class="container">
        <div class="jumbotron">
        <div class="row align-items-center">
          <div class="col-md-4 col-xs-4">
            <img id="mateo" width="196" height="242" src="../img/mateo.jpeg">
            <h4>Nicolás Diorio</h4>
            <p class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, veritatis iure a quidem ullam id consequuntur laudantium ipsum ipsa qui.</p>
          </div>
          <div class="col-md-4 col-xs-4">
            <img width="206" height="242" src="../img/diego.png">
            <h4>Mackenson Fontalis</h4>
            <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit possimus deleniti dolorem quam illum sequi fugiat reprehenderit, aperiam placeat beatae quidem! Consectetur dolores eos quo.</p>
          </div>
        </div>  
  
      </div>
      </div>
    <br>
    <br>
    <br>
    
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-4">
            <h4>Nicolás Diorio</h4>
            <p>Legajo 26051</p>
          </div>
          <div class="col-md-4 col-xs-4">
            <h4>Mackenson Fontalis</h4>
            <p>Legajo 20740</p>
          </div>
          <div class="col-md-4 col-xs-12">
            <p>Helpme - Proyecto Laboratorio IV - PHP - UTN - TUP - 2021-B</p>
            
          </div>     
        </div>
      </div>
    </footer>
    
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
  </body>
</html>