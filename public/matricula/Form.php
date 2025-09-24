<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Matricula</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Matricular aluno</h1>
        <hr>
        <form action="index.php?param=matricula/salvar" method="POST">
            
            <div class="form-group">
                <label for="aluno">Aluno:</label>
                    <select name="aluno" id="aluno" class="form-control">
                        <?php foreach($alunos as $aluno){
                            echo "<option value=$aluno->id>$aluno->nome</option>";
                        }
                        ?>
                        
                    </select> 
            </div>
            
            <div class="form-group">
                <label for="curso">Curso:</label>
                    <select name="curso" id="curso" class="form-control">
                        <?php foreach($cursos as $curso){
                            echo "<option value=$curso->id>$curso->nome</option>";
                        }
                        ?>
                        
                    </select> 
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php?param=aluno/listar" class="btn btn-secondary">Voltar para a Lista</a>
        </form>
    </div>
</body>
</html>