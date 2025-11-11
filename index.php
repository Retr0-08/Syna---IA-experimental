<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Syna - Login</title>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <div class="auth-container fade-in">
    <div class="auth-box glow-border">
      <h1 class="logo">
        <img src="assets/images/olho-roxo.png" alt="Syna" class="logo-img">
      </h1>
      <h2>Seja bem-vindo a Syna.</h2>
      <p class="subtitle">Entre com sua conta para continuar</p>

      <form id="login-form">
        <div class="input-group">
          <input type="text" id="username" placeholder="Usuário" required />
        </div>
        <div class="input-group">
          <input type="password" id="password" placeholder="Senha" required />
        </div>

        <button type="submit" class="btn">Entrar</button>
      </form>

      <p class="link">
        Não tem conta?
        <a href="register.php">Cadastre-se aqui</a>
      </p>
    </div>
  </div>

  <script src="assets/js/app.js"></script>

  <!-- Login fixo admin/admin com sessionStorage -->
  <script>
    const loginForm = document.getElementById('login-form');

    loginForm.addEventListener('submit', (e) => {
      e.preventDefault(); // impede envio normal

      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value.trim();

      if (username === 'admin' && password === 'admin') {
        // salva login no sessionStorage
        sessionStorage.setItem('logged_in', 'true');
        // redireciona para chat
        window.location.href = 'chat.php';
      } else {
        alert('Usuário ou senha incorretos!');
      }
    });

    // Se já estiver logado, redireciona direto para chat
    if (sessionStorage.getItem('logged_in')) {
      window.location.href = 'chat.php';
    }
  </script>
</body>
</html>
