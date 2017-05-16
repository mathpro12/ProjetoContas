<!DOCTYPE html>
<html lang = "pt-br">
    <head>
      <meta charset="UTF-8"/>
      <title>Gerenciador de Contas</title>

      <link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
    </head>
  <body>
    <div>
      <?php

        $cont = 0;

        $numero = $_POST["numero"];
        $codigo = $_POST["codigo"];
        $vencimento = $_POST["vencimento"];
        $valor = $_POST["valor"];
        $sacado = $_POST['sacado'];
        $cedente = $_POST['cedente'];
        $banco = $_POST['banco'];

        if ($numero == "" || $codigo == "" || $vencimento == "" || $valor == "" || $sacado == "" || $cedente == "" || $banco == "") {
          $cont++;
        }

        if ($cont == 0) {
            
         $mysqli = new mysqli("localhost", "root", "", "bancocontas");

          if (!$mysqli) {
            echo "Erro: Não foi possível realizar a conexão." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
          } else {

            if ($_POST['pago'] == 1) {
               $sql = mysqli_query($mysqli, "INSERT INTO contas VALUES ($numero, '$codigo', '$vencimento', $valor, '$sacado', '$cedente', '$banco', 1);") or die (mysqli_error($mysqli));
            }else{
              $sql = mysqli_query($mysqli, "INSERT INTO contas VALUES ($numero, '$codigo', '$vencimento', $valor, '$sacado', '$cedente', '$banco', 0);") or die (mysqli_error($mysqli));
            }
              echo "<script>alert('Conta inserida com sucesso no banco!');</script>";
              mysqli_close($mysqli);
              header('Location: main.php');
            }
        }
        else{
           echo "<script>alert('Todos os dados devem ser preenchidos!');</script>";
           echo "<script>javascript:history.go(-1);</script>";
        }
      ?>
      </div>
  </body>
</html>