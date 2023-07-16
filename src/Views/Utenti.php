<head>
<script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


<script>

$( document ).ready(function() {
 
    js_carica();

});


function js_carica(){

var i=0;

$.ajax({

url: '/nuovo/dati',
type: 'GET',
dataType: "json",

data: {},

success: function (response) { 

$("#dati").html("");

  console.log(response) ;

  tabella=("<table class='table table-responsive'><tr><th>Nome</th><th>Cognome</th><th>Ruolo</th><th>Eta</th></tr>");

  response.forEach(function(value){

    tabella+=("<tr><td>" + value.nome + "</td><td>" + value.cognome + "</td><td>" + value.ruolo + "</td><td>" + value.eta + "</td></tr>")
  i++;
  }
  )
  
  tabella+="</table>";

  $("#dati").append(tabella);
  $("#conta").text("Numero di records trovati con Jquery. " + i);

},
error: function (response) {   console.log("Error" + response) ;},
});
}


</script>
</head>

<?php

echo "<table  class='table table-responsive'>
        <tr>
          <td><h2>Qui arrivo da una rotta e riempio un div da jquery con un array fatto da un metodo</h2></td>
          </tr>
          <tr>
          <td><div id='dati'></div></td>
          
        </tr>
        <tr>
          <td id='conta'></td>
        </tr>
        <tr>
          <td><hr></td>
        </tr>
        <tr>
          <td><hr></td>
        </tr>
        <tr>
          <td><h2>Facciamo Qualche altro array sulla pagina:</h2></td>
        </tr>
        <tr>
          <td><b>Ciclo su Array mono:</b></td>
        </tr>";

  $simple=["davide","serenella","bianca","benedetta"];

  echo"<table  class='table table-responsive'>";

    foreach($simple as $valore){

      echo"<tr><td>{$valore}</td></tr>";

    }
    echo"</table></td></tr>";
    
    $rest=array_filter($simple,function($value){
            
      return $value=="davide";
    
    });
    
    echo"<tr><td><b>Ecco l'array mono dopo il filter per davide</b></td></tr><br><br>";
    
    foreach($rest as $value){
    echo "{$value}<br>";
    }
    
    echo"<br><tr>
    <td><b>Ciclo su Array Multi:</b></td>
  </tr>";

$lista=[["nome"=>"davide","cognome"=>"cupri","anno"=>1975],["nome"=>"serenella","cognome"=>"foligno","anno"=>1978],["nome"=>"bianca","cognome"=>"cupri","anno"=>2000],["nome"=>"benedetta","cognome"=>"cupri","anno"=>2010]];

$i=0;

$testata="";
$righe="";
$record="";

foreach($lista as $riga){

  foreach($riga as $colonna=>$valore){

    if($i==0){

      $testata.="<td>{$colonna}</td>";

    }
    
    $record.="<td>{$valore}</td>";

  }

  $righe.="<tr>{$record}</tr>";
  $record="";
  $i++;

}


echo"<tr><td><table class='table table-responsive'><tr>{$testata}</tr>{$righe}</table></td></tr>";


$nuovo=array_slice($lista,2,3);

echo"<tr>
<td><b>Ciclo su Array Multi dopo lo slice da 2 a 3:</b></td>
</tr>";

$i=0;

$testata="";
$righe="";
$record="";

foreach($nuovo as $riga){

foreach($riga as $colonna=>$valore){

if($i==0){

  $testata.="<td>{$colonna}</td>";

}

$record.="<td>{$valore}</td>";

}

$righe.="<tr>{$record}</tr>";
$record="";
$i++;

}



echo"<tr><td><table class='table table-responsive'><tr>{$testata}</tr>{$righe}</table></td></tr>";


$nuovo_array=[0,1,2,3,4,5,6,7,8,9];

 echo"<br><b>Funzioni su array (sommo un numero casuale):</b><br>";       
// echo "<br>".$seconda_variabile["nome"]." ".$seconda_variabile["cognome"];


// echo"<br>".$terza_variabile[0]["nome"];

$ar=funz::sommatore($nuovo_array,rand(1,10));

echo "<br><hr><br>";

foreach($ar as $res){

    echo "{$res}<br>";

}
echo "<br>";

echo"<br><b>Aggiungo una valore all'array con il map e lo stampo:</b><br>";

$lista2=array_map(function($value){

  $value["eta"]=date("Y")-$value["anno"];
  return $value;

},$lista);


echo"</tr></td></table>";

echo var_dump($lista2);

class funz{

public static function sommatore($lista, $add)
    {

        $rest = [];

        foreach ($lista as $valore) {

            $rest[] = $valore + $add;

        }

        return $rest;

    }
  }

?>