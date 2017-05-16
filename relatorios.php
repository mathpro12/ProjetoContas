<!DOCTYPE html>
<html lang = "pt-br">
    <head>
      <meta charset="UTF-8"/>
      <title>Gerenciador de Contas</title>
      <link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
    </head>

  <body>
   
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="main.php">Gerenciador de Contas</a>
        </div>      
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="cadastrarNovo.html">Cadastrar Novo</a></li>
            <li><a href="relatorios.php">Relatório Anual</a></li>
          </ul>
        </div>
      </div>
    </nav>
   
    <div class="page-header">
      <h1>Total Gasto por Ano</h1>
    </div>
   
    <?php

     $mysqli = new mysqli("localhost", "root", "", "bancocontas");
     if (!$mysqli) {
        echo "Erro: Não foi possível realizar a conexão." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
      } else {
        $sql = "SELECT DISTINCT YEAR (vencimento) FROM `contas`";
        $query = $mysqli->query($sql);
      }

      while($dados = $query->fetch_array()) {
        $sql2 = "SELECT ROUND(SUM(valor), 2) FROM contas WHERE YEAR (vencimento) = " . $dados[0] . ";";
        $query2 = $mysqli->query($sql2);
        $valorTotal = $query2->fetch_array();
        echo "<h3>" . $dados[0] . ": R$ " . $valorTotal[0] . "</h3>";
      }

    ?>
  </body>
</html>