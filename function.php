<?php

function calculo_negociacao($valor_total, $parcelas, $dt_vencimento) {  
    $parcelado = [];

    $valor = $valor_total / $parcelas;
    $valor = number_format((float)$valor, 2, '.', '');

    $parcelado = array_fill(0, $parcelas, ['valor' => $valor]);

    $dt_vencimento = explode( '-', $dt_vencimento);
    $dia = $dt_vencimento[0];
    $mes = $dt_vencimento[1];
    $ano = $dt_vencimento[2];

    for($x = 0; $x < $parcelas; $x++){
        $parcelado[$x]['parcela'] = $x + 1; 
        $parcelado[$x]['dt_vencimento'] = date("Y-m-d",strtotime("+".$x." month",mktime(0, 0, 0, $mes, $dia, $ano)));
    }       
    return $parcelado;
}

?>