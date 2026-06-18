<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pg_Conclusão</title>
</head>

<frameset rows="20%,*">
    <frame name="cabecalho_pg3"
           src="cabecalho_pg3.html"
           scrolling="no"
           noresize>

    <frame name="conteudo_pg3"
           src="conteudo_pg3.php?id=<?= $_GET['id'] ?>"
           scrolling="no"
           noresize>
</frameset>

</html>