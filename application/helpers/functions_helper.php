<?php

function arrayToVars($vetor) {
    if (!is_array($vetor)) {
      echo "Erro: Parametro não é um array válido.<Br>\n";
      return false;
    }

    $tam_vetor = sizeof($vetor);
    reset($vetor);

    for ($i = 0; $i < $tam_vetor; $i ++) {
      $matriz[$i] = key($vetor);
      global $$matriz[$i];
      $$matriz[$i] = $vetor[$matriz[$i]];
      next($vetor);
    }
}

function comboStatus($id = -1){
    $sql = "SELECT * FROM status ORDER BY descricao";
    $result = pg_query($sql) or die(pg_last_error());

    while ($linha = pg_fetch_array($result)) {
      $selected = '';

      ($id == $linha['id']) ?  $selected = "selected" : $selected = "";

      echo "<option $selected value='$linha[id]' ".set_select("status", "$linha[id]").">$linha[descricao]</option>";
    }
}

function comboSexo($s = -1){
    $sql = "SELECT * FROM status ORDER BY descricao";
    $result = pg_query($sql) or die(pg_last_error());

    while ($linha = pg_fetch_array($result)) {
      $selected = '';

      ($id == $linha['id']) ?  $selected = "selected" : $selected = "";

      echo "<option $selected value='$linha[id]' ".set_select("status", "$linha[id]").">$linha[descricao]</option>";
    }
}

function telefoneMask($tel){
  $telefone = "(".substr($tel,0,2).") ".substr($tel,2,4)."-".substr($tel,6,4);

  return $telefone;
}

function dataMask($data){
  $ano = substr($data, 0, 4);
  $mes = substr($data, 5, 2);
  $dia = substr($data, 8, 2);

  return $dia."/".$mes."/".$ano;
}

function dataMaskReverse($data){
  $dataR = substr($data,6,4)."-".substr($data,3,2)."-".substr($data,0,2);

  return $dataR;
}

function diaSemana($data){
  $ano = substr($data, 0, 4);
  $mes = substr($data, 5, 2);
  $dia = substr($data, 8, 2);

  @$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano));

  switch ($diasemana) {
    case '0':
      $diasemana = "Domingo";
      break;
    case '1':
      $diasemana = "Segunda-feira";
      break;
    case '2':
        $diasemana = "Terça-feira";
        break;
    case '3':
       $diasemana = "Quarta-feira";
       break; 
    case '4':
      $diasemana = "Quinta-feira";
      break;
    case '5':
      $diasemana = "Sexta-feira";
      break;
    case '6':
      $diasemana = "Sábado";
      break;
  }

  return "$dia/$mes/$ano ($diasemana)";
}

?>