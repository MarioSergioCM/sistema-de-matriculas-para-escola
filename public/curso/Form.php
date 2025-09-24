<?php if (isset($erro)) { echo "<script>alert('$erro');</script>"; }?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Curso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?= $curso->id ? 'Editar Curso' : 'Cadastrar Novo Curso' ?></h1>
        <hr>
        <form action="index.php?param=curso/salvar" method="POST">
            <input type="hidden" name="id" value="<?= $curso->id ?? '' ?>">
            
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($curso->nome ?? '') ?>" required>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php?param=curso/listar" class="btn btn-secondary">Voltar para a Lista</a>
        </form>
    </div>
</body>
</html>