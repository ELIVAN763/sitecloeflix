<?php
$conexao = mysqli_connect("localhost", "root", "", "elivanflix");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // 1. VERIFICA SE O EMAIL JÁ EXISTE
    $check = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $check);

    if (mysqli_num_rows($resultado) > 0) {
        // Se encontrar algum registro, exibe a mensagem
        echo "<h3 style='color: yellow; text-align:left;'>Atenção: Este usuário já existe!</h3>";
    } else {
        // 2. SE NÃO EXISTIR, INSERE NO BANCO
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        
        if (mysqli_query($conexao, $sql)) {
            echo "<h3 style='color: white; text-align: center;'>Cadastrado com sucesso!</h3>";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Site Moderno</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1d1e22, #ff0909);
            padding: 20px;
            overflow: hidden; /* Evita barras de rolagem desnecessárias */
        }

        /* --- NAVEGAÇÃO LATERAL --- */
        .sidebar {
            position: fixed;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .nav-item {
            width: 40px;
            height: 40px;
            margin: 10px 0;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #f50d05;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav-item:hover {
            background: #14171f;
            color: white;
            transform: scale(1.2);
        }

        /* --- BOTÃO VOLTAR HOME --- */
        .btn-home {
            position: fixed;
            top: 30px;
            right: 30px;
            background: white;
            color: #f50909;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: 0.3s;
            z-index: 1000;
        }

        .btn-home:hover { transform: translateY(-3px); background: #f8f8f8; }

        /* --- CARD DE CADASTRO --- */
        .card-cadastro {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: slideUp 0.8s ease-out;
            z-index: 1;
        }

        h2 { color: #333; margin-bottom: 10px; font-size: 1.8rem; }
        p { color: #f11818; margin-bottom: 30px; font-size: 0.9rem; }

        .input-group { text-align: left; margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #555; font-weight: 600; font-size: 0.85rem; }
        
        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
        }

        input:focus { border-color: #f80b0b; }

        .btn-cadastro {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff2b0f, #dd6a0b);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-cadastro:hover { opacity: 0.9; transform: scale(1.02); }

        .login-link { margin-top: 20px; font-size: 0.85rem; color: #888; }
        .login-link a { color: #6e8efb; text-decoration: none; font-weight: bold; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Estilo das mensagens flutuantes */


.erro { background: #ff0909; color: white; border-left: 8px solid #8b0000; }
.sucesso { background: #2ecc71; color: white; border-left: 8px solid #27ae60; }

@keyframes slideIn {
    from { opacity: 0; transform: translateY(-50%) translateX(-50px); }
    to { opacity: 1; transform: translateY(-50%) translateX(0); }
}

/* Ajuste para telas menores */
@media (max-width: 800px) {
    .alerta { position: static; width: 100%; margin-bottom: 20px; transform: none; }
}

    </style>
</head>
<body>

    <!-- Menu Lateral -->
    <nav class="sidebar">
        <a href="index.html" class="nav-item" title="Início">In</a>
        <a href="#perfil" class="nav-item" title="Perfil">Pf</a>
        <a href="#config" class="nav-item" title="Configurações">Cf</a>
    </nav>

    <!-- Botão Voltar -->
    <a href="index.html" class="btn-home">Home</a>

    <!-- Conteúdo Principal -->
    <div class="card-cadastro">
        <h2>Crie sua conta</h2>
        <p>Junte-se à nossa comunidade hoje mesmo.</p>

        <form action="Cadastro.php" method="POST"> 
            <div class="input-group">
                <label>Nome Completo</label>
                <input type="text" name="nome" id="nome" placeholder="Ex: João Silva" required>
            </div>

            <div class="input-group">
                <label>E-mail</label>
                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="input-group">
                <label>Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Mínimo 8 caracteres" required>
            </div>

            <button type="submit" class="btn-cadastro">Finalizar Inscrição</button>
        </form>

        <div class="login-link">
            Já tem uma conta? <a href="login.html">Faça login</a>
        </div>
    </div>

</body>
</html>
