<?php

require_once "conexao.php";

$NOME = $_POST['nome'];
$CEP = $_POST['cep'];
$RUA = $_POST['rua'];
$BAIRRO = $_POST['bairro'];
$CIDADE = $_POST['cidade'];
$ESTADO = $_POST['estado'];
$NUMERO = $_POST['numero'];
$EMAIL = $_POST['email'];
$TELEFONE = $_POST['telefone'];
$DISCIPLINA = $_POST['disciplina'];

$sql = "INSERT INTO tbaluno (nome, cep, rua, bairro, cidade, estado, numero, email, telefone, disciplina)  VALUES ('$NOME', '$CEP', '$RUA', '$BAIRRO', '$CIDADE', '$ESTADO', '$NUMERO', '$EMAIL', '$TELEFONE', '$DISCIPLINA')";

if (mysqli_query($conn, $sql)){
echo "*** Aluno cadastrado com sucesso ***";
}else{
echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>