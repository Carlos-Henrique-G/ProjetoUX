<?php
  include('testa_sessao.php');
  include('conexao_banco.php');
  $codpersonal = $_SESSION['codpersonal'];
  $nomepersonal = "select nome_personal from tbpersonal where codpersonal='$codpersonal'";

    $consulta_nome = $conexao->query($nomepersonal);
        
    if($consulta_nome->num_rows > 0) {
        $linha = $consulta_nome->fetch_array(MYSQLI_ASSOC);
        
        $_SESSION['nome'] = $linha['nome_personal'];
        
    } 
  
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Brasil Fitness</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="assets/images/halter2.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="home_personal.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Início</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="treino_personal.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Treino</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="usuarios.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Usuários</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="sair.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Sair</span>
              </a>
            </li>
           
          </ul>

          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="assets/images/user-286.png" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3"><?php echo $_SESSION['nome']?></p>
                    </a>
                    
                    
                    <a href="Sair.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Sair</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
      
        <div class="card">
          <div class="card-body">
          <form class="forms-sample" action="cadastrar_usu.php" method="POST" enctype="multipart/form-data">
            <h6 class="card-title">cadastrar clientes</h6>
                      <div class="form-group">
                        <label for="exampleInputName1">Nome</label>
                        <input type="text" class="form-control" id="nome_usu" name="nome_usu" placeholder="Nome">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Email">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                      </div>
                      <br>
                      
                      <div class="form-group">
                        <label  >Foto de perfil</label>
                        <input class="form-control" type="file" id="foto" name="foto">
                      </div>
                      <br>
                      
                      <div class="form-group">
                        <label >Telefone</label>
                        <input type="text" class="form-control"data-mask="(00) 0000-0000" placeholder="(xx) xxxx-xxxx" id="telefone"name="telefone">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="exampleSelectGender">Tipo de treino</label>
                        <select class="form-control" id="tipo_treino"name="tipo_treino">
                          <?php
                           include('conexao_banco.php');

                           $treino = "select distinct tipo_treino from tbtreino";
                           
                       
                           $consulta = $conexao->query($treino);
                           
                               
                           if($consulta->num_rows > 0) {
                               
                               while($linha = $consulta->fetch_array(MYSQLI_ASSOC)){
                                echo '<option>',$linha['tipo_treino'],'</option>';
                                
                               
                           }
                         }
                            
                          ?>
                          
                        </select>
                        
                      </div>
                      <br>
                      
                      
                        <button type="submit" class="btn btn-success mr-2">confirmar</button>
                        <a class="btn btn-danger" href="usuarios.php">Cancelar</a>
                    </form>
                         
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

<script>$('#telefone').mask('(00) 0000-0000');</script>
</body>

</html>