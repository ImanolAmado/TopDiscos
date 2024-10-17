<!-- Menú de navegación con bootstrap -->
<br><br>
<div class="container">
<div class="row">
    <div class="col-lg-6"><h1>Mi web de discos</h1></div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-light " >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- enlaces -->
            <div class="collapse navbar-collapse" id="opciones">   
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="todosLosDiscos.php">Todos los discos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="misPuntuaciones.php">Mis puntuaciones</a>
                </li>
              <!-- Si se ha logeado un admin... -->
                <?php if($_SESSION['rol']=='admin'){ ?>
                      <li class='nav-item'>
                        <a class='nav-link' href='todosLosDiscosEdicion.php'>Gestionar Discos</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='todosLosUsuarios.php'>Gestionar Usuarios</a>
                      </li>                       
                <?php } ?>

                <li class="nav-item">
                  <a class="nav-link" href="welcome.php">Mi perfil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Salir</a>
                </li>           
              </ul>
            </div>
          </nav>
        </div>
    </div>