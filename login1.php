<?php
session_start();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login de Usuário </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/signin.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap1.css">
</head>
<body>
	<div class="container">
		<div class="form-signin">
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
			<form method="POST" action="login2.php" class="fr">
				<h2>Área Restrita</h2>
				<!--<label>Login:</label>--><input type="text" name="login" required="" placeholder="Digite o seu usuário" id="login" class="form-control"><br>
				<!--<label>Senha:</label>--><input type="password" name="senha" required="" placeholder="Digite a sua senha" id="senha" class="form-control"><br>
				<input type="submit" value="Acessar" name="entrar" class="btn btn-sucess1 btn-block"><br>
				<a href="cadastro.html"><h4>Cadastre-se</h4></a>
			</form>
		</div>
	</div>			
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>