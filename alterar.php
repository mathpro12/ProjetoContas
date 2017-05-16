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
            <li><a href="editar.php">Gerenciar Boletos</a></li>
            <li><a href="relatorios.html">Relatórios</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Bootstrap nav bar padrão-->

    <!--Cabeçalho -->
    <div class="page-header">
      <h3>Cadastrar Novo Boleto</h3>
    </div>
    <!--Cabeçalho -->

    <!-- Formulário de cadastro de boleto -->
    <form method = "post" action = "alterando.php">

      <div class = "panel panel-default">
        <div class = "panel-body">

          <div class="input-group">
            <span class="input-group-addon">Número</span>
            <input type="number" name = "numero" class="form-control" value="<?php echo $_GET['numero'] ?>"/>
          </div>
          <br/>

          <div class="input-group">
            <span class="input-group-addon">Código</span>
            <input type="text" name = "codigo" class="form-control" value="<?php echo $_GET['codigo'] ?>">
            <input type="hidden" name = "codigoAntigo" value = "<?php echo $_GET['codigo'] ?>">
          </div>
          <br/>

          <div class="input-group">
            <span class="input-group-addon">Vencimento</span>
            <input type="date" name="vencimento" class="form-control" value="<?php echo $_GET['vencimento'] ?>">
          </div>
          <br/>

          <div class="input-group">
            <span class="input-group-addon">Valor</span>
            <input type="text" name = "valor" class="form-control" value="<?php echo $_GET['valor'] ?>">
          </div>
          <br/>

          <div class="input-group">
            <span class="input-group-addon">Sacado</span>
            <input type="text" name = "sacado" class="form-control" value="<?php echo $_GET['sacado'] ?>">
          </div>
          <br/>

          <div class="input-group">
            <span class="input-group-addon">Cedente</span>
            <input type="text" name = "cedente" class="form-control" value="<?php echo $_GET['cedente'] ?>">
          </div>
          <br/>

          <div class="input-group">
            <span class="input-group-addon">Banco</span>
            <input type="text" name = "banco" class="form-control" value="<?php echo $_GET['banco'] ?>">
          </div>
          <br/>

          <?php

            if($_GET['pago'] == 1){
              echo "<label><input type=\"checkbox\" name = \"pago\" checked = \"checked\" value = \"1\"> Pago?</label></br>";
            }else{
              echo "<label><input type=\"checkbox\" name = \"pago\" value = \"1\"> Pago?</label></br>";
            }

          ?>

          <input type="submit" class = "btn btn-default" value="Alterar"/>
        </div>
      </div>

    </form>

     <!-- Formulário de cadastro de boleto -->
  </body>
</html>