<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?= $aluno->id ? 'Editar Aluno' : 'Cadastrar Novo Aluno' ?></h1>
        <hr>
        <form action="index.php?param=aluno/salvar" method="POST">
            <input type="hidden" name="id" value="<?= $aluno->id ?? '' ?>">
            
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($aluno->nome ?? '') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($aluno->email ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?= htmlspecialchars($aluno->cpf ?? '') ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php?param=aluno/listar" class="btn btn-secondary">Voltar para a Lista</a>
        </form>
    </div>
</body>
</html>