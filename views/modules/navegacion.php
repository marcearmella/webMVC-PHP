<header class="header">
    <nav class="nav">
        <a href="#" class="logo nav-link"><p>Artes Gráficas</p><p>Modelo</p></a>
        <button class="nav-toggle" aria-label="Abrir menú">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
  
            <!-- Página de registro / principal -->
            <li class="nav-menu-item ">
                <a href="index.php" class="nav-menu-link nav-link <?php if(isset($_GET['link'])){ if($_GET['link'] == 'registro'){ echo 'nav-menu-link_active';}}else{echo 'nav-menu-link_active';}?>">
                    Registro
                </a>
            </li>

            <!-- Página de contacto -->
            <li class="nav-menu-item">
                <a href="index.php?link=contacto" class="nav-menu-link nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'contacto') echo 'nav-menu-link_active' ?>">
                    Contacto
                </a>
            </li>
            
            <!-- Página de Usuarios (solo accesible si está iniciada sesion)-->
            <li class="nav-menu-item">
                <a href="index.php?link=usuarios" class="nav-menu-link nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'usuarios') echo 'nav-menu-link_active' ?>">
                    Usuarios
                </a>
            </li>
            
            <!-- Página de Inicio de sesión -->
            <li class="nav-menu-item">
                <?php if(!isset($_SESSION["sessionActive"])): ?>
                    <a href="index.php?link=inicio-sesion" class="nav-menu-link nav-link <?php if(isset($_GET['link']) && $_GET['link'] == 'inicio-sesion') echo 'nav-menu-link_active' ?>">
                        Inicio de sesión
                    </a>
                <?php else: ?>
                    <a href="index.php?link=cerrar-sesion" class="nav-menu-link nav-link">
                        Salir
                    </a>
                <?php endif ?>
            </li>
        </ul>
    </nav>
</header>