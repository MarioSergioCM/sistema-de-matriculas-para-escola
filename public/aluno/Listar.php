<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style> .actions a { margin-right: 10px; } </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Lista de Alunos</h1>
            <a href="index.php?param=aluno/formulario" class="btn btn-success">Adicionar Novo Aluno</a>
            <a href="index.php?param=curso/listar" class="btn btn-info">Area Cursos</a>
            <a href="index.php?param=aluno/formularioMatricula" class="btn btn-warning">Matricular Aluno</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cursos</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($alunos)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum aluno encontrado.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?= htmlspecialchars($aluno->id) ?></td>
                            <td><?= htmlspecialchars($aluno->nome) ?></td>
                            <td><?= htmlspecialchars($aluno->cursos) ?></td>
                            <td><?= htmlspecialchars($aluno->email) ?></td>
                            <td><?= htmlspecialchars($aluno->cpf) ?></td>
                            <td class="actions">
                                <a href="index.php?param=aluno/formulario&id=<?= $aluno->id ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="index.php?param=aluno/excluir&id=<?= $aluno->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>