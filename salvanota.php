<?php

require_once "conexao.php";

$NOME = $_POST['nome'];
$DISCIPLINA = $_POST['disciplina'];
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

$sql = "INSERT INTO tbnotas (nome, disciplina, av1, av2, av3, media, conceito) VALUES ('$NOME','$DISCIPLINA', '$AV1', '$AV2', '$AV3', '$MEDIA', '$CONCEITO')";

if (mysqli_query($conn, $sql)){
echo "*** Nota lançada com sucesso ***";
}else{
echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>