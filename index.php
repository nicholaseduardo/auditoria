<!DOCTYPE html>
<html lang="en">
<head>
    <title>Autenticação</title>
</head>
<body>
    <!-- Formulário de Login -->
  <form action="validacao.php" method="post">
  <fieldset>
  <legend>Dados de Login</legend>
      <label for="txUsuario">Usuário</label>
      <input type="text" name="usuario" id="txUsuario" />
      <label for="txSenha">Senha</label>
      <input type="password" name="senha" id="txSenha" />

      <input type="submit" value="Entrar" />
  </fieldset>
  </form>
</body>
</html>