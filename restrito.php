<?php

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: index.php"); exit;
  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Autenticação</title>
</head>
<body>
<h1>Página restrita</h1>
  <p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>
</body>
</html>