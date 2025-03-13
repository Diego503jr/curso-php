<?php

declare(strict_types=1);

class SuperHero
{
    // Promoted properties -> PHP 8.0
    public function __construct(
        private string $name,
        private array $powers,
        private string $planet)
    {}

    public function attack()
    {
        return "¡$this->name ataca con sus poderes!";
    }

    public function show_all()
    {
        return get_object_vars($this);
    }

    public function description()
    {
        $powers = implode(",", $this->powers);

        return "$this->name es un superheroe que viene de
        $this->planet y tiene los siguientes superpoderes:
        $powers";
    }

    public static function random()
    {
        $names = ["Superman", "Batman", "Wonder", "Flash"];
        $powers = [
            ["Volar", "rayos x", "super fuerza"],
            ["Dinero", "tecnología", "inteligencia"],
            ["Volar", "invisible", "super fuerza"],
            ["Velocidad", "rayos x", "super fuerza"]
        ];
        $planets = ["Krypton", "Gotham", "Themyscira", "Central City"];

        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        return new self($name, $power, $planet);
        // echo "El superheroe $name viene de $planet y tiene los siguientes poderes: " . implode(",", $power);
    }

}


// Metodos estaticos
$heroe = SuperHero::random();

echo $heroe->description();

// Instanciar
$superman = new SuperHero("Superman", ["Volar", "rayos x", "super fuerza"], "Krypton");  