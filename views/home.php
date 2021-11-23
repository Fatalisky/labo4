<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Help Me">
    <meta name="author" content="Mackenson Fontalis, Nicolas Diorio">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/starter-template/">
    <title>Helpme</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/estilos2.css" rel="stylesheet">
    <style>
     .grid1 {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr) ) ;
    background-color: #fff;
    color: #444;
    padding-bottom: 10px;
      }

    .item1 { 
      grid-column: auto / span 3;
      grid-row: auto / span 3;
      background-color: #fff;
      color: #fff;      
      padding: 26px;
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
    }
    .item1 iframe {
    position: absolute;
    top: 20px;
    left: 0;
    width: 100%;
    height: 100%;
    }

    .item2 { grid-column: auto / span 2; }
    .item3 { grid-column: auto / span 2; }
    .item4 { grid-column: auto / span 2; }
    .item5 { grid-column: auto / span 2; }
    .item6 { grid-column: auto / span 2; }
    .item7 { grid-column: auto / span 2; } 

    h5 { color: #f9f5f5; }
    </style>




  </head>

  <body>
  <h4>Bienvenido <?php echo $user->getNombre();  ?></h4>
        <h4>ROL:  <?php echo $user->getNombreRol();  ?></h4>
        <div class="container">
        <header class="cabecera-principal">
            <div id=contenedor-cabecera>
              <img id="logo" src="img/logo1.JPG" alt="Logo Responsive">
            </div>
            <nav  class="nav-principal">
              <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="views/viewsEquipo.php">Equipo</a></li>
                <li><a href="views/viewsServicios.php">Servicios</a></li>                                    
                <li aling=right class="cerrar-sesion">
                <a href="includes/CerrarSesion.php">Cerrar Sesion</a> 
                </li>               
              </ul>
              
            </nav>
        </header>
      </div>
      
      <div class="container">
        <div class="grid1">

          <?php 
        if ( $user->getNombreRol()=="empleado"){
          ?>
          <div class="item6">
          <h4>Administración de requerimientos</h4>
          <h6>Asignar, solucionar o cancelar un requerimiento</h6>
          <a class="btn btn-info" href="views/AdministrarRequerimientos.php" role="button">Ingresar</a>
        </div>

        <div class="item5">
            <h4>Formulario Requerimientos</h4>
            <h6>Ingresar un requerimiento</h6>
            <a class="btn btn-info" href="views/Requerimientos.php" role="button" >Ingresar</a>
          </div>
        <?php
        }elseif ($user->getNombreRol()=="Jefe de area"){
          ?>
         <div class="item6">
          <h4>Administración de requerimientos</h4>
          <h6>Asignar, solucionar o cancelar un requerimiento</h6>
          <a class="btn btn-info" href="views/AdministrarRequerimientos.php" role="button">Ingresar</a>
        </div>

        <div class="item5">
            <h4>Formulario Requerimientos</h4>
            <h6>Ingresar un requerimiento</h6>
            <a class="btn btn-info" href="views/Requerimientos.php" role="button" >Ingresar</a>
          </div>

          <div class="item7"> 
          <h4>Informes</h4>
            <h6>Generar informes</h6>

            <a class="btn btn-info" href="views/Informes.php" role="button">Ingresar</a>     
                  </div>
         
        <?php 
        }else{
          ?> 

          <div class="item2">
          <h4> Áreas</h4>
          <h6>Guardar, Consultar, Modificar y Borrar Áreas</h6>
          <a class="btn btn-info" href="views/Areas.php" role="button">Ingresar</a>
        </div>
        <div class="item3">
          <h4> Empleados</h4>
          <h6>Guardar, Consultar, Modificar y Borrar Empleados</h6>
          <a class="btn btn-info" href="views/Empleados.php" role="button">Ingresar</a>
        </div>  
        <div class="item4">
          <h4> Cargo</h4>
          <h6>Guardar, Consultar, Modificar y Borrar Cargo</h6>
          <a class="btn btn-info" href="views/Cargos.php" role="button">Ingresar</a>
        </div>

        <div class="item6">
          <h4>Administración de requerimientos</h4>
          <h6>Asignar, solucionar o cancelar un requerimiento</h6>
          <a class="btn btn-info" href="views/AdministrarRequerimientos.php" role="button">Ingresar</a>
        </div>

        <div class="item5">
            <h4>Formulario Requerimientos</h4>
            <h6>Ingresar un requerimiento</h6>
            <a class="btn btn-info" href="views/Requerimientos.php" role="button" >Ingresar</a>
          </div>

          <div class="item7"> 
          <h4>Informes</h4>
            <h6>Generar informes</h6>

            <a class="btn btn-info" href="views/Informes.php" role="button">Ingresar</a>     
                  </div>
        <?php 
        }
        
        ?> 
               
          
      
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