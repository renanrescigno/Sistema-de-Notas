<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    require_once "conexao.php";
    
    $sql = "SELECT * FROM tbalunos WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $nome = $row["nome"];
                $rua = $row["rua"];
                $telefone = $row["telefone"];
                $email = $row["email"];
                }else{
                
                header("location: error.php");
                exit();
            }
            
        }else{
         echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
        }
    }
    
    mysqli_stmt_close($stmt);
    
    mysqli_close($conn);
    }else{
    
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>

<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Visualizar Dados</title>
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
                        <h1>Visualizar Dados do aluno</h1>
                    </div>
                    <div class="form-group">
                        <label>nome</label>
                        <p class="form-control-static"><?php echo $row["nome"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>endereco</label>
                        <p class="form-control-static"><?php echo $row["rua"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>salario</label>
                        <p class="form-control-static"><?php echo $row["telefone"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
                    <p><a href="relatorio.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>