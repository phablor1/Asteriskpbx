<?php
session_start();

if (!isset($_SESSION['usuario']) == true) {

	unset($_SESSION['login']);
	header('Location:login_pabx2.php');
}
$logado = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Expires" content="0" />

	<link rel="icon" href="./webphone/Phone/favicon.ico">
	<!--Scripts -->
	<link rel="stylesheet" type="text/css" href="lib/jquery/jquery-ui.min.css" />
	<!-- <link rel="stylesheet" href="bootstrap/css/theme_hello_kiddie.min.css" /> -->
	<link rel="stylesheet" href="bootstrap-4.1.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bibliotecas/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link rel="stylesheet" href="bootstrap-4.1.1-dist/css/estilocustom.css">
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/softphone.css">
	<link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery-ui.min.css"/>
	<script type="text/javascript" src="js/teste.js"></script>
	<script type="text/javascript" src="js/phone.js"></script>
	<!--<script type="text/javascript" src="js/nvoiphone.js"></script>-->
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		p {
			text-align: center;
		}

		.ui-dialog .ui-dialog-content {
			padding: 0px !important;
			overflow: hidden !important;
		}
	</style>

	<title>CONECT PBX</title>


	<style>
		.drop-header-color {
			background-color: skyblue;
		}

		.bg {
			background-color: #74b9ff;

		}


		/* css submenus */
		.dropdown-submenu {
			position: relative;
		}

		.dropdown-submenu a::after {
			transform: rotate(-90deg);
			position: absolute;
			right: 6px;
			top: .8em;
		}

		.dropdown-submenu .dropdown-menu {
			top: 0;
			left: 100%;
			margin-left: .1rem;
			margin-right: .1rem;
		}
	</style>
	<script type="text/javascript">
        function poponload()
        {
            softphone = window.open("./webphone/Phone/index.html","_blank",'location=no,status=no,titlebar=no,toolbar=no,scrollbars=no,menubar=no,width=320,height=500');
            softphone.moveTo(0, 0);
        }
        </script>
</head>

<body>
	<?php
	include 'topo.php';
	?>
	<!--<form id="nvoipconfig-form" action="" hidden="">
		<input id="nvoipconectarServ" type="submit" name="configSubmit">
	</form>-->
	<div id="phone" class="move ui-draggable">
	<script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery-ui.min.js"></script>
		<script>
			function OpenAsWindow() {
				//function abrirPhone(){
				///URL="index.html";
                //window.open(URL,'janela','width=660,height=510,top=100,left=699,scrollbars=yes,status=no,toolbar=no,location=no,directories=no,menubar=no,resizable=no,fullscreen=no');
                //}
				let windowObj = null;
				let width = 340;
				let height = 520;

				if (windowObj != null) {
					windowObj.dialog("close");
					windowObj = null;
				}
				            
				var iframe = $('<iframe/>');
				iframe.css("width", "100%");
				iframe.css("height", "100%");
				iframe.attr("frameborder", "0");
				iframe.attr("src", "./webphone/Phone/index.html");
				// Create Window
				windowObj = $('<div/>').html(iframe).dialog({
					autoOpen: false,
					title: "Conect Phone",
					modal: true,
					width: width,
					height: height,
					resizable: true,
					close: function(event, ui) {
						$(this).dialog("destroy");
						windowObj = null;
					}
				});

				windowObj.dialog("open");

				var windowWidth = $(window).outerWidth();
				var windowHeight = $(window).outerHeight();
				var offsetTextHeight = windowObj.parent().outerHeight();

				windowObj.parent().css('right', windowWidth / 2 - width / 2 + 'px');
				windowObj.parent().css('top', windowHeight / 2 - offsetTextHeight / 4 + 'px');

				if (windowWidth <= width) {
					windowObj.parent().css('left', '0px');
				}
				if (windowHeight <= offsetTextHeight) {
					windowObj.parent().css('top', '15px');
				}

			}
		</script>
	</div>
	<div class="row  justify-content-center mt-4 p-0">
		<img src="imagens/uNGdWHi.png" class="">
		<div class="fab">
			<button class="main" id="nvoipdesminimiza" onclick="poponload()"><i class="fas fa-headset"></i></button>
		</div>
	</div>
	<!--
	<div id="ua" class="nvoipmove ui-draggable">
		<div id="nvoipua-status" class="nvoipbarraSup"><button type="button" onclick="minimiza();" class="btn btn-ligth btn-sm" style="margin-left: 10px;"><i class="fas fa-window-minimize"></i>
			</button><strong>
				<p>PHPHONE</p>
			</strong>
			<div class="nvoipconectado"></div>
		</div>
		<form id="nvoipnew-session-form">
			<div class="nvoipRow">
				<input id="nvoipua-uri" class="nvoipinputgtx" type="text" placeholder="Ramal" autocomplete="off">
				<button id="nvoipapaga" type="button" onclick="apagaInput();" class="btn btn-light btn-sm">
					<i class="bi bi-arrow-left-square"></i>
					<i class="fas fa-backspace"></i>-->
	<!--</button>

			</div>
		</form>
		<div class="nvoipRow">
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('1');">1</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('2');">2</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('3');">3</button>
		</div>
		<div class="nvoipRow">
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('4');">4</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('5');">5</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('6');">6</button>
		</div>
		<div class="nvoipRow">
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('7');">7</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('8');">8</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('9');">9</button>
		</div>
		<div class="nvoipRow" style="margin-bottom: 20px!important;">
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('*');">*</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('0');">0</button>
			<button class="nvoipcircle" name="um" value="1" onclick="nvoipdigita('#');">#</button>
		</div>
		<div class="nvoipRow" style="margin-bottom: 40px!important;">
			<button id="callBtn" type="button" class="btn btn-success px-3" onclick="OpenAsWindow()"><i class="fas fa-phone-square-alt" aria-hidden="true"></i></button>
		</div>
		<div class="nvoipdev" style="font-size: 12px;"> <a style="color: black; text-decoration: none; display: flex; align-items: flex-end;" href="https://phtelecom.sytes.net" target="_blank">
				<p> Desenvolvido por phtelecom</p>
		</div>
	</div>-->

	<!--<script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"></script>-->
	<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<!-- bootstrap-tablelas -->
	<script type="text/javascript" src="bootstrap/js/sb-admin.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/sb-admin-datatables.min.js"></script>

	<script type="text/javascript" src="bibliotecas/datatables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="bibliotecas/datatables/dataTables.bootstrap4.js"></script>
	<!--<div id="getWebphone">
		<script id="script-webphone">
			var config = {
				authorizationUser: '2001',
				password: 'pbx2001',
				options: {}
			};
			$(function() {
				$("#includedContent").load("https://s3-sa-east-1.amazonaws.com/nvoipcom/public/webphone/v4/nvoipwebphone.html");
			});
		</script>
	</div>-->
	<script>
		// script para o submenus
		$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
			if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
			}
			var $subMenu = $(this).next('.dropdown-menu');
			$subMenu.toggleClass('show');


			$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass('show');
			});


			return false;
		});

		//var btn = document.getElementById('nvoipdesminimiza');
		//var container = document.querySelector('.nvoipmove');
		/*var container = document.getElementById('phone');
		btn.addEventListener('click', function() {
			//siphone();

			if (container.style.display === 'block') {
				container.style.display = 'none';
			} else {
				container.style.display = 'block';
			}
		});*/
	</script>
</body>
<?php
include 'rodape.php';
?>

</html>