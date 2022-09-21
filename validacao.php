<?php

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: index.php"); exit;
  }

// Tenta se conectar ao servidor MySQL
$conexao = mysqli_connect('localhost', 'root', 'root') or trigger_error(mysqli_error());
// Tenta se conectar a um banco de dados MySQL
mysqli_select_db($conexao, 'auditoria') or trigger_error(mysqli_error());

// $usuario = mysql_real_escape_string($_POST['usuario']);
// $senha = mysql_real_escape_string($_POST['senha']);

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Validação do usuário/senha digitados
$sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
$query = mysqli_query($conexao, $sql);
echo $sql;
if ($num = mysqli_num_rows($query)) {
    // Salva os dados encontrados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
    mysqli_free_result($query);
    // Se a sessão não existir, inicia uma
    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['id'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];
    $_SESSION['UsuarioNivel'] = $resultado['nivel'];

    // Redireciona o visitante
    header("Location: restrito.php"); exit;
} else {
    
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "Login inválido! $num"; exit;
}
mysqli_close($con);
?>