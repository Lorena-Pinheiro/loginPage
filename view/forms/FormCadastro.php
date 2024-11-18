<link rel="stylesheet" href="../css/formLogin.css">
<div class="wrapper">
  <form action="../view/Cadastro.php?action=cadastrar" method="POST">
    <h2>Cadastrar</h2>
    <div class="input-field">
      <input type="text" required>
      <label>Nome: </label>
    </div>

    <div class="input-field">
      <input type="date" required>
      <label>Data de nascimento: </label>
    </div>

    <div class="input-field">
      <input type="email" required>
      <label>Email: </label>
    </div>

    <div class="input-field">
      <input type="password" required>
      <label>Senha: </label>
    </div>

    <button type="submit">Criar</button>

    <div class="register">
      <p>Já tem uma conta? <a href="../view/Login.php">Login</a></p>
    </div>
  </form>
</div>