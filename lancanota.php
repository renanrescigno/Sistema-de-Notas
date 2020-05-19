<?php
include_once 'conexao.php';
?>

<!DOCTYPE html>

<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>*** Lançar Notas ***</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
	
        .wrapper{
        width: 500px;
        margin: 0 auto;
        }
		
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Lançar Notas dos Alunos</h2>
                    </div>
                    <p>* Preencha os campos abaixo para fazer o lançamento de notas do aluno *</p>
                    <form action="salvanota.php" method="post">

                    <div class="form-groupp ">
                            <label><p>Escolha o Aluno</p></label>
                            <select name="nome"> <br><br>
                            <option value="">Escolha o Aluno</option>
                            <?php
                            
                            $sql = "SELECT * FROM tbalunos WHERE 1";
    
                            if($stmt = mysqli_prepare($conn, $sql)){                               
                                
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                            
                                    if(mysqli_num_rows($result) > 0){
                                        
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        echo "<option value='{$row['nome']}'>{$row['nome']}</option>";
                                        }
                                        
                                    }else{
                                        
                                        header("location: error.php");
                                        exit();
                                    }
                                    
                                    }else{
                                        echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
                                }
                            }
                             
                            ?>
                            
                            </select>
                            
                        </div>
                        <div class="form-groupp ">
                            <label><p>Escolha a Disciplina</p></label>
                            <select name="disciplina"> <br><br>
                            <option value="">Escolha a Disciplina</option>
                            <?php
                            
                            $sql = "SELECT * FROM tbmateria WHERE 1";
    
                            if($stmt = mysqli_prepare($conn, $sql)){                               
                                
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                            
                                    if(mysqli_num_rows($result) > 0){
                                        
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        echo "<option value='{$row['disciplina']}'>{$row['disciplina']}</option>";
                                        }
                                        
                                        }else{
                                        
                                        header("location: error.php");
                                        exit();
                                    }
                                    
                                       }else{
                                        echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
                                }
                            }
                             
                            ?>
                            
                        </select>
                            
                        </div>
                       
					    <div class="form-group">
                            <label>Avaliação 1</label>
                            <input type="text" name="av1" class="form-control">
                        </div>
						
                        <div class="form-group">
                            <label>Avaliação 2</label>
                            <input type="text" name="av2" class="form-control" ></input>  
                        </div>
                        
                        <div class="form-group">
                            <label>Avaliação 3</label>
                            <input type="text" name="av3" class="form-control" ></input> 
                        </div>
                        
                        <input type="submit" name="submit" class="btn btn-primary" value="Lançar Nota">
                        
                        <a href="index.php" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>