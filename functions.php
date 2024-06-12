<?php

declare(strict_types=1);


#Inicializar una nueva sesion de cURL; ch=cURL handle
//$ch = curl_init(API_URL);

//indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*
    ejecutar la peticion y devolver
    el resultado
*/
//$result = curl_exec($ch);
function renderTemplate(string $template, array $data = [])
{
    extract($data);
    
    require "templates/$template.php";
}
function getData(string $url): array
{
    $result = file_get_contents(API_URL);
    $data = json_decode($result, true);
    return $data;
}
function getUntilMessage(int $days): string
{
    return match ($days) {
        0 => "Hoy",
        1 => "Mañana",
        default => "En $days dias"
    };
}
