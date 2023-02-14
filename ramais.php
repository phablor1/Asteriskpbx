<?php 
include 'connect.php';

$sql = "select aors,transport,context,webrtc from ps_endpoints";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConectX - Ramais</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/adminx.css" media="screen" />
</head>

<body>
    <div class="adminx-container">
        <!-- Header -->
        <?php include 'top.php'?>
        <!-- // Header -->

        <!-- expand-hover push -->
        <?php include 'menu.php'?>
        <!-- Main Content -->
        <div class="adminx-content">
            <div class="adminx-main-content">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active  aria-current=" page">Regular Tables</li>
                        </ol>
                    </nav>

                    <div class="pb-3">
                        <h1>Ramais</h1>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card mb-grid">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="card-header-title">Table</div>
                                </div>
                                <div class="table-responsive-md">
                                    <table class="table table-actions table-striped table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <label class="custom-control custom-checkbox m-0 p-0">
                                                        <input type="checkbox" class="custom-control-input table-select-all">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                </th>
                                                <th scope="col">Ramal</th>
                                                <th scope="col">Transporte</th>
                                                <th scope="col">contexto</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php 
                                        $buscar = mysqli_query($conexao,$sql);

                                        while($dados = mysqli_fetch_array($buscar)){
                                            $usuario = $dados['aors'];
                                            $nome = $dados['transport'];
                                            $email = $dados['context'];
                                        
                                        ?>
                                            <tr>
                                                <th scope="row">
                                                    <label class="custom-control custom-checkbox m-0 p-0">
                                                        <input type="checkbox" class="custom-control-input table-select-row">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                </th>
                                                <td><?php echo $usuario?></td>
                                                <td><?php echo $nome?></td>
                                                <td><?php echo $email?></td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">Admin</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary">Editar</button>
                                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <ul class="pagination pagination-clean pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">‹</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">›</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- // Table seamless striped -->

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- // Main Content -->
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
    <script>
        feather.replace()
    </script>
</body>

</html>