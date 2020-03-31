<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE pacientes set  nome='" . $_POST['nome'] . "', bairro='" . $_POST['bairro'] . "' ,regiao='" . $_POST['regiao'] . "' WHERE id='" . $_POST['id'] . "'");

     header("location: index.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM pacientes WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Atualizar paciente</title>
    <?php include "head.php"; ?>
</head>
<body>
      <?php include "header.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Alteração de dados</h2>
                    </div>
                    <p>Edite as informações do paciente e em seguida salve.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $row["nome"]; ?>" maxlength="50" required="">

                        </div>
                        <div class="form-group ">
                            <label>Bairro</label>
                            <input type="text" name="bairro" class="form-control" value="<?php echo $row["bairro"]; ?>" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Região</label>
                            <input type="text" name="regiao" class="form-control" value="<?php echo $row["regiao"]; ?>" maxlength="12"required="">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
