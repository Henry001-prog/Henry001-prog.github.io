<?php
session_start();
include_once("conexao2.php");
$entrar = filter_input(INPUT_POST, 'entrar', FILTER_SANITIZE_STRING);
if($entrar){
  $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
  /*$login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = ($_POST['senha']);
  $conexao = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($conexao, "admin");*/
  if((!empty($login)) AND (!empty($senha))){
    /*echo password_hash ($senha, PASSWORD_DEFAULT);*/
    $result_login = "SELECT id, nome, senha FROM usuarios where login='$login' LIMIT 1"; 
       /*if (mysqli_num_rows($verifica)<=0){
          $row_usuario = mysqli_fetch_assoc($verifica);
          $_SESSION['login'] = $row_usuario['login'];
          $_SESSION['senha'] = $row_usuario['senha'];
          
       
        
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login1.php';</script>";
          die();
        }else{
           header("Location: administrativo.php"); 
          
         }*/
         $hash = '$2y$10$XvlV5LZBxphhj2JkYzmgLOJmAQDX/Seq5N6fQtndcQJ4hfjblYGC6';
         $resultado_login = mysqli_query($conexao,$result_login);
         if($resultado_login){
          $row_login = mysqli_fetch_assoc($resultado_login);
          if(password_verify($senha, $hash/*$row_login['senha']*/)){
            $_SESSION['id'] = $row_login['id'];
            $_SESSION['nome'] = $row_login['nome'];
           echo "<script>
                    window.location.href='administra1.php';alert('Bem-vindo, Robson!');
                </script>";
          }else{
            $_SESSION['msg'] = "Login e senha incorretos!";
            header("Location: login1.php");
          }
        }
      }else{
        $_SESSION['msg'] = "Login e senha incorreto!";
        header("Location: login1.php");
      }
    }else{
      $_SESSION['msg'] = "Página não encontrada";
      header("Location: login1.php");
    }
  
  
 ?>



   