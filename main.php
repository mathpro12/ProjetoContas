<!DOCTYPE html>
<html lang = "pt-br">
    <head>
      <meta charset="UTF-8"/>
      <title>Gerenciador de Contas</title>
      <link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
    </head>
  <body>
    <!--Bootstrap nav bar padrão -->
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
    <!--Fim Nav Bar -->

    <!--Cabeçalho -->
    <div class="page-header">
      <h3>Gerenciar Suas Contas</h3>
    </div>
    <!--Cabeçalho -->

    <?php
      $mysqli = new mysqli("localhost", "root", "", "bancocontas");

      if (!$mysqli) {
        echo "Erro: Não foi possível realizar a conexão." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
      } else {

        $sql = "SELECT * FROM `contas`";

        $query = $mysqli->query($sql);
    ?>

        <div class="panel panel-default">
          <table class = "table">
            <tr>
              <th>Número</th>
              <th>Código</th>
              <th>Vencimento</th>
              <th>Valor</th>
              <th>Sacado</th>
              <th>Cedente</th>
              <th>Banco</th>
              <th>Pago</th>
            </tr>

            <?php
              $vetor = "";
              $count = 0;
              while ($dados = $query->fetch_array()) {
                  echo "<tr>";
                  $var = "";
                  for ($i = 0; $i < 7; $i++) { 
                    $var .= "<td>" . $dados[$i] . "</td>";
                  }
                  echo $var;
                  if ($dados[7] == 1) {
                    echo "<td> Pago </td>"; 
                  } else {
                     echo "<td> Não Pago </td>"; 
                  }
                  echo "<td>";
                  echo "<a href =" . "alterar.php?numero=" . $dados[0] . "&codigo=" . $dados[1] . "&vencimento=" . $dados[2] . "&valor=" . $dados[3] . "&sacado=" . $dados[4] . "&cedente=" . $dados[5] . "&banco=" . $dados[6] . "&pago=" . $dados[7] . ">Alterar</a>";
                  echo "</td>";
                  echo "</tr>";

                  $vetor[$count] = $dados[1];
                  $count++;
                }
          echo "</table> </div>";
      }
      
      mysqli_close($mysqli);
    ?>

  </body>
</html>

