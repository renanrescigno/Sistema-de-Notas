<?php

require_once "conexao.php";

isset($_GET['nome'])? $nome=$_GET['nome'] : $nome=""; 

if (isset($_POST['enviar'])):
    $NOME = $_POST['nome'];
    $AV1 = $_POST['av1'];
    $AV2 = $_POST['av2'];
    $AV3 = $_POST['av3'];
    $CONCEITO = '';

    $MEDIA = ($AV1 + $AV2 + $AV3 ) / 3;

    if ($MEDIA >= 8.5):
        $CONCEITO = "A";
    elseif (($MEDIA < 8.4) && ($MEDIA >= 7)):
        $CONCEITO = "B";
    elseif (($MEDIA < 6.9) && ($MEDIA >= 6)):
        $CONCEITO = "C";
    elseif (($MEDIA < 5.9) && ($MEDIA >= 4)):
        $CONCEITO = "D";
    else: 
        $CONCEITO ="F";         
    endif;
	
    $sql = "UPDATE tbnotas SET av1 = $AV1, av2 = $AV2, av3 = $AV3, media = $MEDIA, conceito = '$CONCEITO' WHERE nome = '$NOME'";

if (mysqli_query($conn, $sql)){
  echo "Nota alterada com sucesso";
}else{
  echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}

endif;
?>

<!DOCTYPE html>

<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>*** Alterar Notas ***</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
	
        .wrapper{
        width: 500px;
        margin: 0 auto;
        }
		
    </style>
	
<script language="javascript">
var nome, disciplina;

function reload(form){
var sel = document.getElementById('nome');
var nome=sel.options[sel.options.selectedIndex].value;
self.location='alterarnota.php?nome=' + nome;
}

function reloadDisciplina(form){
var selNome = document.getElementById('nome').value;
var sel = document.getElementById('disciplina');
var disciplina=sel.options[sel.options.selectedIndex].value;
setnotes (selNome, disciplina);
}

function setnotes (nome, disciplina) {
self.location='alterarnota.php?nome=' + nome + '&disciplina=' + disciplina;
}

function disableselect()

{
<?Php
if(isset($nome) and strlen($nome) > 0){

echo "document.addEventListener('DOMContentLoaded', function(event) {document.getElementById('disciplina').disabled = false;});";}
else{echo "document.addEventListener('DOMContentLoaded', function(event) {document.getElementById('disciplina').disabled = true;});";}
?>
}

</script>
</head>
<body onload=disableselect();>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Alterar Notas dos Alunos</h2>
                    </div>
                    <p>******** Preencha os campos abaixo com as alterações necessárias ********</p>
                    <form action="" method="post">
                    <div class="form-groupp ">
                        <label><p>Escolha o Aluno</p></label>
                        <select id="nome" name="nome" onchange="reload(this.form)"><option disabled selected value=''>Escolha um Aluno</option>
<?php

$query1="SELECT DISTINCT nome,id FROM tbnotas order by nome"; 
if($stmt = $conn->query("$query1")){
	while ($row2 = $stmt->fetch_assoc()) {
	if($row2['nome']==$nome){
      echo "<option selected value='$row2[nome]'>$row2[nome]</option>";
    }else{
      echo  "<option value='$row2[nome]'>$row2[nome]</option>";}
    $nomeAluno = $row2['nome'];
}
    }else{
      echo $conn->error;
}

?>
</select>
  </div>
    <div class="form-groupp ">
        <label><p>Escolha a Disciplina</p></label>
    <select name='disciplina' id='disciplina' onchange="reloadDisciplina(this.form)"><option selected value=''>Escolha uma Disciplina</option>
<?php
$query2 = "SELECT DISTINCT disciplina FROM tbnotas where nome='$nome' order by disciplina";
if($stmt = $conn->query("$query2")){
 while ($row1 = $stmt->fetch_assoc()) {
   $disciplina = $row1['disciplina'];
   echo  "<option value='$row1[disciplina]'>$row1[disciplina]</option>";
}
}else{
   echo $conn->error;
}

?>
</select> 
</div>
<?php

if(isset($_GET["nome"]) && isset($_GET["disciplina"])){
$query3 = "SELECT distinct av1, av2, av3 FROM tbnotas where nome='{$_GET["nome"]}' and disciplina='{$_GET["disciplina"]}'";
if($stmt = $conn->query("$query3")){
    while ($row0 = $stmt->fetch_assoc()) {
        $AV1 = $row0['av1'];
        $AV2 = $row0['av2'];
        $AV3 = $row0['av3'];
}
}else{
    echo $conn->error;
}
}

?>
                        <div class="form-group">
                            <label>Atividade 1</label>
                            <input type="text" name="av1" class="form-control" <?php echo isset($AV1)? "value='$AV1'" : "placeholder='Selecione uma disciplina'"; ?>>
                            
                        </div>
                        <div class="form-group">
                            <label>Atividade 2</label>
                            <input type="text" name="av2" class="form-control" <?php echo isset($AV1)? "value='$AV2'" : "placeholder='Selecione uma disciplina'"; ?>>
                            
                        </div>
                        <div class="form-group">
                            <label>Atividade 3</label>
                            <input type="text" name="av3" class="form-control" <?php echo isset($AV1)? "value='$AV3'" : "placeholder='Selecione uma disciplina'"; ?>>
                            
                        </div>
                        
                        <input type="submit" name="enviar" class="btn btn-primary" value="Alterar Nota">
                        <a href="index.php" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>