<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Avaliação PHP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <form id="userForm" method="POST" action="index.php" onsubmit="return validateForm('userForm', ['name', 'email', 'password']);">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">
            
            <input type="submit" value="Cadastrar">
        </form>
        <div class="button-container">
            <a href="index.php?view=users" class="button">Ver Usuários Registrados</a>
        </div>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (name === "" || email === "" || password === "") {
                alert("Todos os campos devem ser preenchidos.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
