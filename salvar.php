<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome       = $_POST['fmNome'] ?? '';
    $email      = $_POST['fmEmail'] ?? '';
    $telefone   = $_POST['fmTelefone'] ?? '';
    $nascimento = $_POST['fmNascimento'] ?? '';
    $genero     = $_POST['fmGenero'] ?? '';
    $rua        = $_POST['fmRua'] ?? '';
    $cidade     = $_POST['fmCidade'] ?? '';
    $estado     = $_POST['fmEstado'] ?? '';
    $cep        = $_POST['fmCEP'] ?? '';
    $altura     = $_POST['fmAltura'] ?? '';
    $peso       = $_POST['fmPeso'] ?? '';
    $atividade  = $_POST['fmAtividade'] ?? '';

    $erros = [];

    if (empty($nome) || empty($email) || empty($genero) || empty($atividade)) {
        $erros[] = "Preencha todos os campos obrigatórios.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }

    if (empty($erros)) {

        try {

            $sql = "INSERT INTO inscricao_participante (
                nome,
                email,
                telefone,
                nascimento,
                idgenero,
                rua,
                cidade,
                estado,
                cep,
                altura,
                peso,
                idcompeticoes
            ) VALUES (
                :nome,
                :email,
                :telefone,
                :nascimento,
                :idgenero,
                :rua,
                :cidade,
                :estado,
                :cep,
                :altura,
                :peso,
                :idcompeticoes
            )";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':nascimento' => $nascimento,
                ':idgenero' => $genero,
                ':rua' => $rua,
                ':cidade' => $cidade,
                ':estado' => $estado,
                ':cep' => $cep,
                ':altura' => $altura,
                ':peso' => $peso,
                ':idcompeticoes' => $atividade
            ]);

            $idinscricao = $pdo->lastInsertId();

            header("Location: pg-Conclusao.php?id=$idinscricao");
            exit();
        } catch (PDOException $ex) {

            if ($ex->getCode() == 23000) {
                echo "<h2>Erro: Esse e-mail já está cadastrado.</h2>";
            } else {
                echo "<h2>Erro ao salvar no banco de dados.</h2>";
                echo "<pre>" . $ex->getMessage() . "</pre>";
            }

        }

    } else {

        echo "<h2>Erros no formulário:</h2>";

        foreach ($erros as $erro) {
            echo "<p>$erro</p>";
        }

        echo '<button onclick="history.back()">Voltar</button>';

    }

} else {

    echo "Acesso não permitido.";

}
?>