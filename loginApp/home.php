<?php
//use LogiApp\Model\User; 
    session_start();
    //return to login if not logged in
    if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
    	header('location:index.php');
    }
    
    include_once('User.php');
    
    $user = new User();
    
    //fetch user data
    $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user']."'";
    $row = $user->details($sql);

    ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>ConectPbx</title>
    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
    	<h1 class="page-header text-center">ConectPbx</h1>
    	<div class="row">
    		<div class="col-md-4 col-md-offset-4">
    			<h2>Bem Vindo </h2>
    			<h4>Infor Usuario: </h4>
    			<p>Nome: <?php echo $row['name']; ?></p>
    			<p>Usuario: <?php echo $row['username']; ?></p>
    			<p>Senha: <?php echo $row['password']; ?></p>
    			<a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    		</div>
    	</div>
    </div>
    </body>
    </html>