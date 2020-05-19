<!DOCTYPE html>

<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>*** Gerenciamento de Notas ***</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1 style="color:#FFFFFF;">*** Gerenciamento de Notas ***</h1>

    <div class="middle">
      <div class="menu">
        <li class="item" id='profile'>
        <a href="#profile" class="btn"><i class="far fa-user"></i>Área do Professor</a>
        <div class="smenu">
        <a href="cadastradisciplina.php">Cadastrar Disciplina</a>
        <a href="cadastraaluno.php">Cadastrar Aluno</a>
        </div>
        </li>
		
        <li class="item" id="messages">
        <a href="#messages" class="btn"><i class="far fa-file-alt"></i> Cadastro de Notas</a>
        <div class="smenu">
        <a href="lancanota.php">Lançar Nota do Aluno</a>
        <a href="alterarnota.php">Alterar Nota do Aluno</a>
        <a href="relatorio.php">Relatório dos Alunos</a>
        </div>
        </li>
		
        <li class="item">
        <a class="btn" href="#"><i class="fas fa-sign-out-alt"></i>Sair</a>
        </li>
      </div>
    </div>
  </body>
</html>