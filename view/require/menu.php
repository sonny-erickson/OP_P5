
<header class="bg-dark">
  <div class="container-fluid">
    <div class="row mb-3" id="header">
      <img src="assets/logo.png" alt="logo manette">    
    </div>
    <div class="row mb-3" >
    
      
      <nav class="navbar navbar-expand-md bg-dark navbar-light">
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=home">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="index.php?page=top">Top</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="index.php?page=news">Nouveautés</a>
            </li>
            <?php if(isset($_SESSION['pseudo'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profil
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?page=listing">Ma liste de jeux</a>
              </div>
            </li>
            <?php endif;?>
            
            <?php if(isset($_SESSION['pseudo'])): ?>
              <li><a class="nav-link text-danger"  href="index.php?page=deconnexion">Deconnexion</a></li>
            <?php else:?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Authentification
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-success" href="index.php?page=inscription">S'inscrire</a>
                  <a class="dropdown-item text-warning" href="index.php?page=connection">Connection</a>
                  <a class="dropdown-item text-danger" href="index.php?page=deconnexion">Deconnexion</a>
                </div>
              </li>

              <?php endif;?>
             
            
           
            
            
          </ul>
        </div>
      </nav>
    </div>
    <div class="row pb-4">
      <form class="form-inline mb-3" id="search-form" >
      <input class="form-control mr-2" id="search" type="search" placeholder="Recherche" aria-label="Search">
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>-->
      <div id='list'></div><!-- For beautiful list under-->
      </form>
      <?php if(isset($_SESSION['pseudo'])):?>
              <div class="container-fluid text-light text-center" id="bar"> Bienvenue <?= $_SESSION['pseudo'] ?></div>
      <?php endif;?>
    </div>
  </div>
  <script src="js/search.js"></script>
</header>
