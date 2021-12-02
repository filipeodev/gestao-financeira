<?php if(!class_exists('Rain\Tpl')){exit;}?>

	



	<div class="cad-login col-m-12">
		<form action="/login" method="post">
		  <div class="form-group">
		    <label for="emailusuario">Email ou Usuário</label>
		    <input type="text" class="form-control" id="emailusuario" name="emailusuario" required autofocus>
		  </div>
		  <div class="form-group">
		    <label for="senhausuario">Senha</label>
		    <input type="password" class="form-control" id="senhausuario" name="senhausuario" required>
		  </div>
		  
		  <button type="submit" class="btn-login-1">Entrar</button>
		  <div class="btns-login">
		  	<a class="btn-login-2" href="/cadastro" role="button">Cadastre-se</a>
		  </div>
		  <a class="btn-login-3" href="/esqueceu-senha" role="button">Esqueceu a senha?</a>
		</form>
	</div>

	<footer>
		<script src="res/bootstrap/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
		<script src="res/js/jquery.js"></script>
	</footer>
</body>
</html>

