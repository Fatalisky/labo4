
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
<div class="container">
          
    <div id="login">
        <h3 class="text-center text-white pt-5">Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="POST">
                            <?php
                                if(isset($errorLogin)){
                                    echo $errorLogin;
                                }

                            ?>


                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input type="text" name="txtUsername" pattern="[A-Za-z0-9_-]{1,20}" required placeholder="Usuario" id="username" class="form-control"> <!------value='".$idU."'---------->
                            </div>
                            <div class="form-group">
                                
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="password" name="txtPassword" pattern="[A-Za-z0-9_-]{1,20}" required placeholder="Contraseña" id="password" class="form-control"> <!------value='".$pas."'---------->


                                <!-- pattern="[A-Za-z0-9_-]{1,20}" -->
                                <!-- <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="password" name="txtPassword" id="password" class="form-control"> -->
                                 <!-- ----value='".$pas."'-------- -->
                            </div>
                            <div class="form-group">
                                 <input type="submit" name="btn" class="btn btn-info btn-md" value="Ingresar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
