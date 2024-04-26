
<?php

const API_URL = "https://whenisthenextmcufilm.com/api/";

#inicializar una nueva sesión CURL ; ch = cURL handl
$ch = curl_init();



//Inidicar que queremos recibir el resutlado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_URL, "https://whenisthenextmcufilm.com/api");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_HTTPAUTH, true);

//fue necesario agregar estas dos lineas para que no diera un error relativo al SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);




print_r(curl_getinfo($ch));



/* ejecutar la peticion y guardar rdo y lo ponga en un array asociativo */


$result = curl_exec($ch);
// tambien se puede usar file_get_contents


if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
    echo 'Operation completed without any errors, you have the response';
}
$data = json_decode($result,true);

curl_close($ch);



?>


<head>
    <title>la proxima </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
</head>
<main>
    <h2>La próxima  </h2>




    <pre style="font-size: 8px; overflow: scroll;"> 
        <?php var_dump($data) ?> 
    </pre>

    <section>
        <img src="<?= $data["poster_url"]?>" width="300" alt="poster de <?= $data["title"] ?>" style="border-radius: 16px" />
    </section>

    <hgroup>
        <h3> <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?> </p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?> </p>
    </hgroup>

</main>




<style>
:root {
    color-scheme: light dark;
}

body  {
    display: grid;
    place-content: center;
}

section {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}

img {
    margin: 0 auto;
}
</style>



