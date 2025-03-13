<?php
declare(strict_types=1);

class NextMovie
{
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview)
    {}

        // Obtener dias que faltan para estrenar la peli
    public function get_until_message(): string
    {
        $days = $this->days_until;

        return match (true) {
            $days === 0  => "¡Hoy se estrena! 🤗",
            $days === 1  => "Mañana se estrena ✏️",
            $days < 7    => "Esta semana se estrena 🤭",
            $days < 30   => "Este mes se estrena... 🗓",
            default      => "$days días hasta el estreno 🏴",
        };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        //Hacemos el GET a la API
        $res = file_get_contents($api_url);

        // Decodificamos la informacion
        $dt = json_decode($res, true);

        return new self(
            $dt["title"],
            $dt["days_until"],
            $dt["following_production"]["title"] ?? "Desconocido",
            $dt["release_date"],
            $dt["poster_url"],
            $dt["overview"]
        );
    }

    public function get_data()
    {
        return get_object_vars($this);
    }
}