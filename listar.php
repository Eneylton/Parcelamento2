<?php

include('./function.php');

$resultados ="";

if(isset($_POST['valor'])){

$valor = $_POST['valor'];
$parcela = $_POST['parcela'];
$dt_vencimento = date("d-m-Y", strtotime($_POST['data']));;
$negociacao = calculo_negociacao($valor, $parcela, $dt_vencimento);

foreach ($negociacao as $item) {
    
    $resultados .= '<tr>
    <td>' . date('d/m/Y ', strtotime($item['dt_vencimento'])) . '</td>
    <td>' . $item['parcela'] . '</td>
    <td>R$ ' . number_format($item['valor'], "2", ",", ".") . '</td>
    </tr>

    ';


$resultados = strlen($resultados) ? $resultados : '<tr>
                                   <td colspan="3" class="text-center" > Nenhuma parcela Encontrada !!!!! </td>
                                   </tr>';
}


}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema de parcelamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        margin-top: 50px;
    }
</style>

<body>

    <div class="container">
       
        <h2 style="text-align: center;">+++ SISTEMA DE PARCELAMENTO +++</h2>
        <p>PARCELAMENTO:</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DATA DO VENCIMENTO</th>
                    <th>PARCELAS</th>
                    <th>VALOR</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </div>

</body>

</html>