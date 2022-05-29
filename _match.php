<?php

include "Team.php";

class _match
{
    public int $id = 0;
    public _match|null $lastMatch = null;
    public Team $team1;
    public Team $team2;
    public int $score1;
    public int $score2;

    /**
     * @param null $lastMatch
     * @param $team1
     * @param $team2
     */
    public function __construct($team1, $team2, $lastMatch = null)
    {
        if(!is_null($lastMatch)) {
            $this->id = $lastMatch->id + 1;
        } else {
            $this->id = 0;
        }
        $this->lastMatch = $lastMatch;
        $this->team1 = $team1;
        $this->team2 = $team2;
    }

    public function __toString(): string
    {
        return "id : " . $this->id . "<br>" .
            "lastMatch : " . $this->lastMatch . "<br>";
    }


}