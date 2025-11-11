<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Syna - IA Experimental</title>
  <link rel="stylesheet" href="assets/css/chat.css">
</head>
<body>
  <div class="chat-container fade-in">
    <header>
      <h1 class="logo">Syna<span>.</span></h1>
      <button id="logout">Sair</button>
    </header>

    <div class="chat-box" id="chat-box">
      <div class="message bot glow">👋 Olá! Eu sou a <strong>Syna</strong>. Como você está hoje?</div>
    </div>

    <div class="input-area">
      <input type="text" id="user-input" placeholder="Digite sua mensagem...">
      <button id="send-btn">Enviar</button>
    </div>
  </div>

  <!-- Scripts -->
  <script src="assets/js/ai.js"></script>
  <script src="assets/js/chat.js"></script>

  <!-- Login fixo admin + proteção de acesso -->
  <script>
    // 🔹 Verifica se usuário está logado (somente admin)
    if (!sessionStorage.getItem('logged_in')) {
      alert("Acesso restrito! Faça login como admin.");
      window.location.href = 'index.php';
    }

    // 🔹 Botão "Sair" → limpa sessão e volta para login
    document.getElementById('logout').addEventListener('click', () => {
      sessionStorage.removeItem('logged_in');
      window.location.href = 'index.php';
    });
  </script>
</body>
</html>
