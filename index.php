<?php //phpinfo(); 
include 'connect.php';

$sql = "SELECT COUNT(aors) AS Total FROM ps_endpoints";


session_start();

if (!isset($_SESSION['usuario']) == true) {

	unset($_SESSION['login']);
	header('Location:login_pabx2.php');
}
$logado = $_SESSION['usuario'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ConectX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/adminx.css" media="screen" />

    <!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
-->
<script type="text/javascript">
        function poponload()
        {
            softphone = window.open("./webphone/Phone/index.html","_blank",'location=no,status=no,titlebar=no,toolbar=no,scrollbars=no,menubar=no,width=320,height=500');
            softphone.moveTo(0, 0);
        }
        </script>
</head>

<body>
    <div class="adminx-container">
        <?php
        include 'top.php';
        ?>

        <?php
        include 'menu.php'
        ?>

        <!-- adminx-content-aside -->
        <div class="adminx-content">
            <!-- <div class="adminx-aside">

        </div> -->

            <div class="adminx-main-content">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

                    <div class="pb-3">
                        <h1>Dashboard</h1>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex">
                            <div class="card mb-grid w-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h6 class="card-title mb-0">
                                            Total das ligações ativas
                                        </h6>

                                        <div class="card-title-sub">
                                            R$753.82
                                        </div>
                                    </div>

                                    <div class="progress mt-auto">
                                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">3/4</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex">
                            <div class="card mb-grid w-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="card-title mb-0">
                                            Ocupação de canais
                                        </h5>

                                        <div class="card-title-sub">
                                            18/30
                                        </div>
                                    </div>

                                    <div class="progress mt-auto">
                                        <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex">
                            <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                                <div class="d-flex flex-row align-items-center h-100">
                                    <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                                        <i data-feather="layers"></i>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-info-title">Filas</div>
                                        <h3 class="card-title mb-0">
                                            8
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex">
                            <div class="card border-0 bg-success text-white text-center mb-grid w-100">
                                <div class="d-flex flex-row align-items-center h-100">
                                    <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                                        <i data-feather="users"></i>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="card-info-title">Total Ramais</div>
                                        
                                        <h3 class="card-title mb-0">
                                        <?php
                                        foreach($conexao->query('select count(aors) from ps_endpoints') as $dados){
                                          echo $dados['count(aors)'];
                                        }
                                        //$ramais = mysqli_query($conexao,$sql);
                                        //$dados = $ramais -> fetch_assoc();
                                        //echo $dados['Total'];
                                        ?>
                                           </h3>
                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="card-header-title">Informações</div>

                                    <nav class="card-header-actions">
                                        <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false" aria-controls="card1">
                                            <i data-feather="minus-circle"></i>
                                        </a>

                                        <div class="dropdown">
                                            <a class="card-header-action" href="#" role="button" id="card1Settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="settings"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="card1Settings">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>

                                        <a href="#" class="card-header-action">
                                            <i data-feather="x-circle"></i>
                                        </a>
                                    </nav>
                                </div>
                                <div class="card-body collapse show" id="card1">
                                    <h4 class="card-title">Special title treatment</h4>
                                    <p class="card-text">Saiba como realizar integrações com o connectpbx.</p>
                                    <a href="#" class="btn btn-primary">Integrações</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">Softphone</div>
                                <div class="card-body">
                                    <h4 class="card-title">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <!--<a href="#" class="btn btn-primary"><i data-feather="headphones"></i></a>-->
                                    <button class="btn btn-primary" onclick="poponload()"><i data-feather="headphones"></i></button>
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

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="./dist/js/vendor.js"></script>
    <script src="./dist/js/adminx.vanilla.js"></script-->
    <script>
        feather.replace()
    </script>
</body>

</html>