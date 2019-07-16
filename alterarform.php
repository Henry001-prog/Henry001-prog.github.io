<!DOCTYPE html>
<html lang="pt-br" >
<head>
	<meta charset="UTF-8">
	<title>Administração da Loja</title>
	
	
</head>
<body>
<?php
			$operacao = $_POST["operacao"];
			include_once ("conecta_mysql.inc");
			if($operacao=="alterar")
		{
			$codigo = $_POST['codigo'];
			
			
			$resultado3 = mysqli_query($conexao, "select * from produtos where codigo='$codigo'");
			$resultado2 = mysqli_affected_rows($conexao);
			 
			for ($i=0; $i<$resultado2; $i++)
			
				$reg = mysqli_fetch_row($resultado3);
				
			if($resultado2==1) {
			echo "<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo date('his'); ?>";	
			echo
				"<tr>
					<td width='33%' rowspan='3' valign='top' height='325'>
				<form method='post' action='concluir.php'>
					<font face='Arial' size='5'><p align='center'>
					<p align='center'><br>
					Código: <input type='text' name='codigo' size='5' value='$reg[0]' /></p><p align='center'>
					<p align='center'>
					Nome do produto: <input type='text' name='nome' size='20' placeholder='Nome Produto' value='$reg[1]' /></p>
					<p align='center'>Descrição do produto:<br>
					<textarea rows='2' name='descricao' cols='20' >$reg[2]</textarea></p>
					<p align='center'>
					Preço: <input type='text' name='preco' size='10' value='$reg[3]'>
					Peso: <input type='text' name='peso' size='10' value='$reg[4]'></p>
					<p align='center'>Cód. Categoria: <input type='text' name='cc' size='4' value='$reg[5]'></br>
					<br>Cód. Subcategoria: <input type='text' name='cs' size='4' value='$reg[6]'></p>
					<p align='center'>Inf. Adicionais: <input type='text' name='ad' size='20' value='$reg[7]'></p>
					<p align='center'>
					<input type='submit' value='Alterar Produto' name='enviar' style='cursor: pointer' class='alt1'></font></p></br>	
				</form>
				</td>
				</tr>";
				}else{
				
				echo "<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo time(); ?>'>"."<script>window.location='administra1.html';alert('Produto não encontrado!');</script>";}
		
		}
		
		elseif($operacao=="produtos")
		{
			$codigo = $_POST['codigo'];
			
			
			$produtos = mysqli_query($conexao, "select * from produtos where codigo='$codigo'");
			$resultado5 = mysqli_affected_rows($conexao);
			echo "<p><b>Lista de produtos da loja</b></p>";
			for ($i1=0; $i1<$resultado5; $i1++)
			{
				$reg2 = mysqli_fetch_row($produtos);
				echo "<link rel='stylesheet' type='text/css' href='administra2.css?id=<?php echo date('his'); ?>"."<p>Código: $reg2[0]<br> Produto: $reg2[1]<br> Descrição: $reg2[2]<br> Preço: $reg2[3]<br>";
				echo "Peso: $reg2[4]<br> Código da Categoria: $reg2[5]<br> Código da Subcategoria: $reg2[6]<br> Descrição: $reg2[7]<br></p>";
			}
		}
			
?>
</body>
</html>