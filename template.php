<?php
declare(strict_types=1);  // A nivel de archivo para tipar

// Funcion para renderizar templates
function render_template(string $template, array $data = [])
{
    extract($data);
    require_once  "templates/$template.php";
}