<?php 
include 'connect.php';
//include 'validacoes.php';

if (isset($_GET['user'])):
    $user = mysqli_escape_string($conexao,$_GET['user']);

    $query = "SELECT usuario,senha_usuario,nome,email FROM usuario WHERE usuario='$user'";
    $consulta = mysqli_query($conexao,$query);
    $dados = mysqli_fetch_array($consulta);
    //var_dump($dados);
    //print_r($dados);
endif;

?>
<!DOCTYPE html>

<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/adminx.css" media="screen" />
</head>

<body>
  <div class="adminx-container">
    <?php
    include 'top.php';

        ?>

    <?php
    include 'menu.php'
    ?>
    <div class="adminx-content">
      <div class="adminx-main-content">
        <div class="container-fluid">
          <!-- BreadCrumb -->
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Editar Usuarios</a></li>
              <li class="breadcrumb-item active  aria-current=" page">usuarios</li>
            </ol>
          </nav>
          <div class="pb-3">
            <h1>Editar Usuario</h1>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="card mb-grid">
                <div class="card-header">
                  <div class="card mb-grid">
                    <div class="card-header">
                      <div class="card-header-title">Editar Usuario</div>
                    </div>
                    <div class="card-body">
                      <form id="needs-validation" novalidate action="editarUsuario.php" method="POST">
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label" for="validationCustom01">Usuario</label>
                            <input type="text" name="user" class="form-control" id="" placeholder="" readonly="readonly" value="<?php echo $dados['usuario']; ?>">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label" for="validationCustom02">Senha</label>
                            <input type="password" name="senha" class="form-control" id="" placeholder="" value="<?php echo $dados['senha_usuario'];?>">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label" for="validationCustom03">Nome</label>
                            <input type="text" name="nome" class="form-control" id="" placeholder="" value="<?php echo $dados['nome'];?>" required>
                            <div class="invalid-feedback">
                              Please provide a valid city.
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label" for="validationCustom04">Email</label>
                            <input type="text" name="email" class="form-control" id="" placeholder="" value="<?php echo $dados['email'];?>" required>
                            <div class="invalid-feedback">
                              Please provide a valid state.
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-primary mr-2" type="submit">Atualizar</button>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
      feather.replace()
    </script>
</body>

</html>