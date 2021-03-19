<!----------------------PHP---------------------->

<?php

$url = ("https://api.apify.com/v2/key-value-stores/TyToNta7jGKkpszMZ/records/LATEST?disableRedirect=true"); // assimilando API a uma variavel.
$ch = curl_init($url); //Iniciando o cURL com curl_init e a variavel e atribuindo isso a uma variavel "ch".
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //converter em array para podermos ler.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //depois de iniciar a API devemos executar o SSL ( Ele cria um canal criptografado entre um servidor web e um navegador (browser) para garantir que todos os dados transmitidos sejam sigilosos e seguros.)
$apiExec = json_decode(curl_exec($ch)); //curl_exec ira executar o cURL que no caso executa uma API que esta na variavel "ch", json_decode ira decodificar o que recebemos e atribuimos a uma outra variavel.

$varApi = $apiExec;

//echo "<pre>";
//var_dump($apiExec);
//echo "</pre>";

//Looping para tabela

//Infected
foreach ($apiExec->infectedByRegion as $uf) {
    //echo "<pre>";
    //var_dump($uf);
    //echo "</pre>";

    //echo $uf->state;
    //echo $uf->count;

    //Infected

    //Infected

    //echo "Cotação: " . $uf->count . "<br>";

    //echo "<hr>";
}

foreach ($apiExec->deceasedByRegion as $uff) {
    //echo "<pre>";
    //var_dump($uf);
    //echo "</pre>";

    //echo $uff->count;
    //echo "Cotação: " . $uf->count . "<br>";

    //echo "<hr>";
}
?>



<!----------------------PHP---------------------->