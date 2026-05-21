<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Elivanflix</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #141414; /* Fundo escuro estilo streaming */
            color: #ffffff;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #181818;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            border: 1px solid #282828;
        }

        .header {
            background-color: #E50914; /* Vermelho Netflix */
            color: #ffffff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h5 {
            font-size: 1.4rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .badge-local {
            background-color: rgba(0, 0, 0, 0.4);
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 15px 20px;
            border-bottom: 1px solid #282828;
        }

        th {
            background-color: #222222;
            color: #aaaaaa;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background-color: #1f1f1f;
        }

        tr:hover {
            background-color: #252525;
        }

        .user-name {
            font-weight: 600;
            color: #ffffff;
        }

        .user-email {
            color: #3897f0;
            text-decoration: none;
        }

        .user-email:hover {
            text-decoration: underline;
        }

        .password-crypt {
            font-family: monospace;
            color: #888888;
            font-size: 0.9rem;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #777777;
            padding: 30px;
        }

        .text-danger {
            color: #E50914;
            padding: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h5>Elivanflix - Usuários</h5>
        <a href="index.html"> <span class="badge-local">Painel Local</span></a>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexão com o banco local 'elivanflix'
                $conexao = mysqli_connect("localhost", "root", "", "elivanflix");

                if (!$conexao) {
                    echo "<tr><td colspan='3' class='text-danger text-center'>Erro de conexão: " . mysqli_connect_error() . "</td></tr>";
                    exit;
                }

                // Busca apenas os campos necessários (o id fica oculto no banco)
                $resultado = mysqli_query($conexao, "SELECT nome, email, senha FROM usuarios");

                if (mysqli_num_rows($resultado) > 0) {
                    while ($usuario = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td class='user-name'>" . htmlspecialchars($usuario['nome']) . "</td>";
                        echo "<td><a href='mailto:" . htmlspecialchars($usuario['email']) . "' class='user-email'>" . htmlspecialchars($usuario['email']) . "</a></td>";
                        echo "<td class='password-crypt'>" . htmlspecialchars($usuario['senha']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-muted text-center'>Nenhum usuário cadastrado no Elivanflix.</td></tr>";
                }

                mysqli_close($conexao);
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
