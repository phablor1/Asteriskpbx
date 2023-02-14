<?php 
//include 'connect.php';
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
    <title>ConnectX - Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/adminx.css" media="screen" />
</head>

<body>
    <div class="adminx-container">
        <!-- Header -->
        <?php include 'top.php' ?>
        <!-- // Header -->

        <!-- expand-hover push -->
        <?php include 'menu.php' ?>

        <!-- Main Content -->
        <div class="adminx-content">
            <div class="adminx-main-content">
                <div class="container-fluid">
                    <?php 
                    if(isset($_GET['cadastro'])){
                        switch($_GET['cadastro']){
                            case "ok":                        
                    ?>
                    <div class="alert alert-success offset-2 w-50 dismissable">
					<button class="close" type="button" data-dismiss="alert">&times;</button>
					<?php

					?>
					<strong class="d-flex justify-content-center">Usuario <?php echo $_GET['user']; ?> criado com sucesso!!!</strong>
				</div>
                <?php 
                break;
                case "fail":
                ?>
                    <div class="alert alert-danger offset-2 w-50 dismissable">
					<button class="close" type="button" data-dismiss="alert">&times;</button>
					<?php

					?>
					<strong class="d-flex justify-content-center">Usuario <?php echo $_GET['user']; ?> Ja existente na base de dados.</strong>
				</div>
                </div>
                <?php 
                break;
            }
        }
                ?>

<?php
	if (isset($_GET['deletado'])) {  // dados deletado com sucesso
		switch ($_GET['deletado']) {
			case "ok": // dados deletado com sucesso
	?>
				<div class="alert alert-success offset-2 w-50 dismissable">
					<button class="close" type="button" data-dismiss="alert">&times;</button>
					<strong class="d-flex justify-content-center">Usuario <?php echo $_GET['user']; ?> deletado com sucesso </strong>
				</div>

			<?php
				break;
			case "fail":  // dados dados deletado com sucesso
			?>
				<div class="alert alert-danger offset-2 w-50 dismissable">
					<button class="close" type="button" data-dismiss="alert">&times;</button>

					<strong class="d-flex justify-content-center">Erro ao deletar Usuario <?php echo $_GET['user']; ?> </strong>
				</div>

	<?php
				break;
		}
	}?>

<?php
	if (isset($_GET['update'])) {  // dados recebidos atualizado com sucesso
		switch ($_GET['update']) {
			case "ok": // dados recebidos atualizado com sucesso
	?>
				<div class="alert alert-success offset-2 w-50 dismissable">
					<button class="close" type="button" data-dismiss="alert">&times;</button>
					<strong class="d-flex justify-content-center">Usuario "<?php echo $_GET['user']; ?>" atualizado com sucesso ! </strong>
				</div>

			<?php
				break;
			case "fail":  // dados recebidos atualizado com sucesso
			?>
				<div class="alert alert-danger offset-2 w-50 dismissable">
					<button class="close" type="button" data-dismiss="alert">&times;</button>

					<strong class="d-flex justify-content-center">Erro ao Atualizar Usuario <?php echo $$_GET['user']; ?> </strong>
				</div>

	<?php
				break;
		}
	}?>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        //feather.replace()
            
    </script>
</body>

</html>