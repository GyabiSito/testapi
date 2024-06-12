<?php
declare (strict_types = 1);
class SuperHero
{
    //Propiedades y metodos

    public function __construct(
        private string $name,
        private array $power,
        private string $planet
    ) {
    }
    public function attack()
    {
        return $this->name . " is attacking ";
    }
    public function showAll(){
        return get_object_vars($this);
    }
    public function description()
    {
        $powers = implode(", ", $this->power);
        return $this->name . " has the power of " . $powers . " and comes from " . $this->planet;
    }
    public static function random(){
        $names = ["Superman", "Batman", "antman", "spiderman"];
        $powers=[
            ["Fly","calzones"],
            ["Rich","Batmobile"],
            ["Shrink","Ant"],
            ["Spider","Web"]
        ];
        $planets = ["Krypton", "Gotham", "Quantum Realm", "New York"];
        $name= $names[array_rand($names)];
        $power= $powers[array_rand($powers)];
        $planet= $planets[array_rand($planets)];

        return new self($name, $power, $planet);
        //echo "Name: $name, Planet: $planet, Power: ".implode(", ",$power);
    }

}
//estatico
$hero=SuperHero::random();
echo $hero->description();
//Metodo publico
/*
$hero = new SuperHero("Superman", ["Fly", "Laser eyes"], "Krypton");
$hero->description();*/