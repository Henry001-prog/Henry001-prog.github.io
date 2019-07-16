<?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador 
o caminho para a página principal do site (sistema), burlando assim a obrigação de 
fazer um login, com isso se ele não estiver feito o login não será criado a session, 
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/
session_start();
if(!empty($_SESSION['id'])){
	/*echo "";*/
	
}else{
	$_SESSION['msg'] = "<h4>Não Permitido!</h4>";
	header("Location: login1.php");	
}
/*if(empty($_SESSION['login'])){
	echo "Olá ".$_SESSION['senha'].", Bem-vindo <br>";
	echo "<a href='sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login1.php");
}*/
/*if((isset ($_SESSION['login']) == true) || (isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	/*header('location:login1.php');
  }*/
 
/*$logado = $_SESSION['login'];*/
  /*if(empty($_SESSION['login'])){
  echo "Olá ".$_SESSION['senha'].", Bem-vindo <br>";
	echo "<a href='sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login1.php");
}		
}*/
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
	<title>Formulário</title>
	<meta charset="UTF-8">
	<meta http-equiv="cache-control" content="no-cache" />
	<link rel="stylesheet" type="text/css" href="Formulário_backgroun.css?version=12" />
	<link rel="stylesheet" type="text/css" href="teste.css?version=12" />
	<!--<link rel="stylesheet" type="text/css" media="screen and (min-width: 0px)" href="small.css?version=12" />
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="medium.css?version=12" />
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 13500px)" href="large.css?version=12" />-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>

<body>
	<div align="center" class="uma-div"><center>
	<table id="take" border="2" cellpadding="0" cellspacing="1" width="69%"
		bordercolor="#008000" height="345">
	<tr bgcolor="#E0EEEE" id="tab1">
		<td id="inc" width="43%" bgcolor="#000080" height="29"><p align="center">
		<font color="FFFFFF" face="Arial" size="4"><b>Incluir Produto</b></font></td>
		<td id="exc" width="43%" bgcolor="#000080" height="29%"><p align="center">
		<font color="#FFFFFF" face="Arial" size="4"><b>Excluir Produto</b></font></td>
	</tr>
	<tr id="m2">
		<td width="30%" rowspan="3" valign="top" height="164" id="td1">
		<form method="post" action="administra.php" id="td2">
			<input type="hidden" name="operacao" value="incluir">
			<p align="center" id="no"><br>
			<font face="Arial" size="4" id="font">Código: <input type="text" name="codigo" size="5" id="cod" required=""></p><p align="center" id="produ">
			Nome do produto: <input type="text" name="nome" size="18" id="nom">
			<p align="center" id="des">Descrição do produto:<br>
			<textarea rows="2" name="descricao" cols="20" id="tex"></textarea>
			<p align="center">
			Preço: <input type="text" name="preco" size="10" id="preco">
			<p align="center">
			Peso: <input type="text" name="peso" size="10" id="peso"><br/>
			<p align="center" id="categ2">Cód. Categoria: <input type="text" name="cc" size="4" id="categ">
			<br align="center" id="subc2">
			Cód. Subcategoria: <input type="text" name="cs" size="4" id="subc">
			<p align="center" id="inf2">Inf. Adicionais: <input type="text" name="ad" size="20" id="inf">
			<p align="center">
				<input type="submit" value="Incluir Produto" name="enviar" id="inclui" style="cursor: pointer"></font></p>
		</td>
		
		</form>
		
		
		<td width="33%" height="24"><p align="center"><br>
		<font size="5" id="exc2">Código do produto a ser excluído:</font></p>
		<form method="post" action="administra.php" id="e">
			<input type="hidden" name="operacao" value="excluir"">
			<p align="center"><input type="text" name="codigo" size="5" id="exclui" class="exclui"></p>
			<p align="center">
			<input type="submit" value="Excluir Produto" name="enviar" id="exclui2"style="cursor: pointer"></p>
		</form>
		<p align="center"><br>
		</td></tr>
		<tr id="tt">
			<td width="43%" bgcolor="#000080" height="19%" id="ta">
			<p align="center"><font color="FFFFFF" face="Arial" size="4">
			<b>Mostrar Produtos</b></font></td>
		</tr>
		<tr>
			<td width="33%" height="24%">
			<p align="center"><br>
			<font face="" size="5" id="clique"> Clique no botão abaixo para exibir todos os produtos da loja:</font></p>
			<form method="post" action="administra.php" id="m">
				<input type="hidden" name="operacao" value="mostrar">
				<p align="center">
					<input type="submit" value="Mostrar Produtos" name="enviar" id="mostrar"style="cursor: pointer"></p>
					<br>
			</form>
			<p align="center"></p></td>
		</tr>
		<tr id="t">
			<td  class="tabela1" width="50%" bgcolor="#000080" height="19"><p align="center">
			<font color="FFFFFF" face="Arial" size="4"><b>Alterar Produto</b></font></td>
			
			<td class="tabela2" width="50%" bgcolor="#000080" height="19"><p align="center">
			<font color="#FFFFFF" face="Arial" size="4"><b>Pesquisar Produto</b></font></td>
		</tr>
		<tr>
		<td id="m1" width="33%" valign="top" height="158">
		<form method="post" action="alterarform.php" class="fomr-alt">
			<input type="hidden" name="operacao" value="alterar">
			<p align="center" id="al"><br>
			<font face="Arial" size="5">Código: <input type="text" name="codigo" size="5" id="alter"/></p>
				<input type="submit" name="enviar" value="Alterar" id="altera" style="cursor: pointer">
		</form>
		</td>
		<td id="m1" width="33%" valign="top" height="158">
		<form method="post" action="alterarform.php" class="form-pesq">
			<input type="hidden" name="operacao" value="produtos">
			<p align="center" id="al2"><br>
			<font face="Arial" size="5">Código: <input type="text" name="codigo" size="5" id="exibe"/></p>
			
				<input type="submit" name="enviar" class="form-control" value="Exibir Produto" id="altera2" style="cursor: pointer">
					
		</form>
		</td>
		</tr>
	</table>
	</center>
	<?php echo "<a href='sair.php' class='sai'>Sair</a>";?>
	</div>
</body>
</html>