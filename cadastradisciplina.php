<!DOCTYPE html>

<html lang="pt">

<meta charset="UTF-8">
    <title>*** Cadastrar Disciplina ***</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
	
        .wrapper{
        width: 500px;
        margin: 0 auto;
        }
		
    </style>
	
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Cadastrar Disciplina</h2>
                    </div>
                    <p>************* Preencha estes campos para cadastrar a disciplina *************</p>
                    <form action="salvadisciplina.php" method="post">
                    <div class="form-group" >
                        <label>Nome da Disciplina</label>
                        <input type="text" name="materia" class="form-control" >  
                     </div>
                        <input type="submit" class="btn btn-primary" value="Cadastrar Disciplina">
                        <a href="index.php" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>