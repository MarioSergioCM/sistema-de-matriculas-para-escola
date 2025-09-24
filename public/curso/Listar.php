<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cursos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style> .actions a { margin-right: 10px; } </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Lista de Cursos</h1>
            <a href="index.php?param=curso/formulario" class="btn btn-success">Adicionar Novo Curso</a>
            <a href="index.php?param=aluno/listar" class="btn btn-info">Area Alunos</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($cursos)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum curso encontrado.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($cursos as $curso): ?>
                        <tr>
                            <td><?= htmlspecialchars($curso->id) ?></td>
                            <td><?= htmlspecialchars($curso->nome) ?></td>
                            <td class="actions">
                                <a href="index.php?param=curso/formulario&id=<?= $curso->id ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="index.php?param=curso/excluir&id=<?= $curso->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>