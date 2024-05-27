<?php
  include('../banco/conexao_banco.php');
  
        
 
    
  session_start();
  if(isset($_GET['id'])){
    $_SESSION['id_temp2']=$_GET['id'];
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
  <style>
    .lista li {
  flex: 1 0 15%; /* Mantém uma largura máxima de 200px para cada item */
  min-width: 15%; /* Largura mínima de 200px para garantir que todos tenham o mesmo tamanho */
  padding: 10px;
  text-align: center;
}

/* Estilos adicionais para as colunas */
.colu1, .colu2, .colu3, .colu4, .colu5, .colu6 {
  width: 100%;
}

 .lista li {
    display:inline-block;
    margin: 0 0 0 15px;
    
    }
    .add-usu{
      margin:1%;
    }
    .lista UL{
      display:flex;
      align-items:center;
      justify-content:space-around;
    }.lista UL img{
      width:8rem;
      height:8rem;
    }
</style>
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
          <a href="home_personal.php" class="text-nowrap logo-img">
            <img src="../logos/halter2.png" width="180" alt="" />
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
                  <img src="../logos/user-286.png" alt="" width="35" height="35" class="rounded-circle">
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
        <!-- Modal -->
       
<!-- Modal -->

        <a href="add_exercicio.php?id=<?php echo $_SESSION['id_temp2']; ?>" class="add-usu btn btn-primary">Adicionar Exercício</a>
        <div class="card">
          <div class="card-body">
            
          <div class="lista">
            
          


            <ul class="lista">
              <li class="colu1"><strong>Foto</strong></li>
              <li class="colu2"><strong>Exercício</strong></li>
              <li class="colu3"><strong>Séries</strong></li>
              <li class="colu4"><strong>repetições</strong></li>
              <li class="colu5"><strong>intervalo</strong></li>
              <li class="colu6"><strong>ações</strong></li>
            </ul>
            <?php
include('../banco/conexao_banco.php');


    $exercicios = "SELECT tbtreino.*, tbexercicio.* FROM tbexercicio INNER JOIN tbtreino ON tbexercicio.codtreino = tbtreino.codtreino WHERE tbtreino.codtreino = " . $_SESSION['id_temp2'];
    $consulta = $conexao->query($exercicios);

    if ($consulta == true) {
        while ($linha = $consulta->fetch_array(MYSQLI_ASSOC)) {
            echo '<ul class="lista">';
            echo '<li class="colu1"><img src="../exercicios_fotos/' . $linha['foto_exercicio'] . '"></li>';
            echo '<li class="colu2">' . $linha['nome_exercicio'] . '</li>';
            echo '<li class="colu3">' . $linha['series'] . '</li>';
            echo '<li class="colu4">' . $linha['repeticoes'] . '</li>';
            echo '<li class="colu5">' . $linha['intervalo'] . '</li>';

            $modal_id = 'modaldesc_' . $linha['codexercicio'];

            echo '<li class="colu6">';
            echo '<button title="descrição" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#' . $modal_id . '"><i class="ti ti-article"></i></button><br>';
            echo '<a title="editar" href="editar_exercicio.php?id=' . $linha['codexercicio'] . '" class="btn btn-success"><i class="ti ti-edit"></i></a><br>';
            echo '<a title="excluir" href="excluir_exercicio.php?id=' . $linha['codexercicio'] . '" class="btn btn-danger"><i class="ti ti-trash"></i></a>';
            echo '</li>';
            echo '</ul><hr><br>';

            echo '<div class="modal fade" id="' . $modal_id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title" id="exampleModalLabel">Descrição</h5>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">' . $linha['descricao'] . '</div>';
            echo '<div class="modal-footer">';
            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>';
           
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

?>         
  </div>
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
</body>

</html>