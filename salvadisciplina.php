<?php

require_once "conexao.php";
 
$N_MATERIA = $_POST['materia'];

$sql = "INSERT INTO tbmateria (DISCIPLINA)  VALUES ('$N_MATERIA')";

if (mysqli_query($conn, $sql)){
echo "*** Disciplina cadastrada com sucesso ***";
}else{
echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>