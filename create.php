<?php
require_once "connection.php";

if(isset($_POST['save']))
{

     $nome = $_POST['nome'];
     $bairro = $_POST['bairro'];
     $regiao = $_POST['regiao'];
     $sql = "INSERT INTO pacientes (nome,bairro,regiao)
     VALUES ('$nome','$bairro','$regiao')";
     if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Novo paciente</h2>
                    </div>
                    <p>Preencha todos os dados referentes ao paciente.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>Bairro</label>
                            <input type="text" name="bairro" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Região</label>
                            <input type="text" name="regiao" class="form-control" value="" maxlength="12" required="">
                        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>

            </div>

        </div>

</body>
</html>
