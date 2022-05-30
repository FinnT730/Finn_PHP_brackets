<?php

class Team
{
    public $name = "";
    public $players = 10;

    /**
     * @param string $name
     * @param int $players
     */
    public function __construct(string $name, int $players)
    {
        $this->name = $name;
        $this->players = $players;
    }

    public function __toString(): string
    {
        return "Team name : " . $this->name . "<br>";
    }


}