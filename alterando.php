<?php

	$numero = $_POST["numero"];
	$codigo = $_POST["codigo"];
	$codigoAntigo = $_POST["codigoAntigo"];
	$vencimento = $_POST["vencimento"];
	$valor = $_POST["valor"];
	$sacado = $_POST['sacado'];
	$cedente = $_POST['cedente'];
	$banco = $_POST['banco'];

	$mysqli = new mysqli("localhost", "root", "", "bancocontas");

	if (!$mysqli) {
    	echo "Erro: Não foi possível realizar a conexão." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
  	} else {
	  	if ($_POST['pago'] == 1) {
	  		$sql = mysqli_query($mysqli, "UPDATE contas set numero = '$numero', codigo = '$codigo', vencimento = '$vencimento', valor = '$valor', sacado = '$sacado', cedente = '$cedente', banco = '$banco', pago = 1 WHERE codigo = '$codigoAntigo';") or die (mysqli_error($mysqli));
	    }else{
      		$sql = mysqli_query($mysqli, "UPDATE contas set numero = '$numero', codigo = '$codigo', vencimento = '$vencimento', valor = '$valor', sacado = '$sacado', cedente = '$cedente', banco = '$banco', pago = 0 WHERE codigo = '$codigoAntigo';") or die (mysqli_error($mysqli));
      	}
    }
    echo "<script>alert('Conta inserida com sucesso no banco!');</script>";
    mysqli_close($mysqli);
 	header('Location: main.php');
?>