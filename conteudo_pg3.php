<?php
$idinscricao = $_GET['id'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Conclusão</title>
</head>

<body style="text-align: center;">

    <h1 style="color: green; margin-bottom: 0;">
        PARABÉNS
    </h1>

    <p style="color: green;">
        Sua inscrição foi realizada com sucesso!
    </p>

    <br>

    <a href="comprovante.php?id=<?= $idinscricao ?>" target="_blank">
        <button style="
            background-color: darkblue;
            color: white;
            font-size: larger;
            border-radius: 10px;
            padding: 30px;">
            Imprimir comprovante
        </button>
    </a>

</body>

</html>