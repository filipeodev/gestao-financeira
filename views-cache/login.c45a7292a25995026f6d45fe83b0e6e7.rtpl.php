<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  	<link rel="stylesheet" href="res/js/fontawesome.js">
  	<!-- CSS Files -->
  	<link href="res/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  	<link href="res/css/style.css" rel="stylesheet" />
  	<script src="res/js/sweetalert.js"></script>
  	
</head>
	<body class="bg-login">
		<?php if( $msE != '' ){ ?>
			<script>
				swal({
					title: "Algo não está certo!",
				  	text: '<?php echo htmlspecialchars( $msE, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
				  	icon: "error",
				});
			</script>
		<?php } ?>
		<div class="formulario-login">
			<form action="/login" method="post">
			    <div class="row">
			      <div class="col-md-12">
			        <div class="form-group">
			          <label class="bmd-label-floating">E-mail ou Usuário</label>
			          <input type="text" id="email" name="email" class="form-control" required autofocus>
			        </div>
			      </div>
			      <div class="col-md-12">
			        <div class="form-group">
			          <label class="bmd-label-floating">Senha</label>
			          <div class="input-senha">
			          	<input type="password" id="senha" name="senha" class="form-control" required>
		          		<i class="material-icons" onclick="textPass()" id="mudarVisual">
		          			remove_red_eye
						</i>
			          </div>
			        </div>
			      </div>
			    </div>
			    	<button type="submit" class="btn btn-primary pull-right">Entrar</button>
			    <div class="clearfix"></div>
			</form>
		</div>

		<footer class="footer-page">
			<!-- <script src="res/bootstrap/js/bootstrap.min.js"></script> -->
			<script src="res/js/all.js"></script>

			<script src="res/js/jquery.min.js"></script>
			<script src="res/js/popper.min.js"></script>
			<script src="res/js/bootstrap-material-design.min.js"></script>
			<!-- <script src="res/js/events.js"></script> -->
  			<script src="https://unpkg.com/default-passive-events"></script>
			<script src="res/js/perfect-scrollbar.jquery.min.js"></script>
			<!-- Place this tag in your head or just before your close body tag. -->
			<!-- <script async defer src="res/js/buttons.js"></script> -->
  			<script async defer src="https://buttons.github.io/buttons.js"></script>
			<!--  Google Maps Plugin    -->
			<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
			<!-- Chartist JS -->
			<script src="res/js/chartist.min.js"></script>
			<!--  Notifications Plugin    -->
			<script src="res/js/bootstrap-notify.js"></script>
			<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
			<script src="res/js/material-dashboard.js?v=2.1.0"></script>
			<!-- Material Dashboard DEMO methods, don't include it in your project! -->
			<script src="res/js/demo.js"></script>
		</footer>

		<script>
		  function textPass() {
		    var idSenha = document.getElementById("senha").type;
		    if(idSenha == 'password'){
		    	document.getElementById("senha").type = 'text';
		    }else{
		    	document.getElementById("senha").type = 'password';
		    }
		  }
		</script>
	</body>
</html>