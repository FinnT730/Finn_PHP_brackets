<?php

include "_match.php";



global $matches;
$matches = [];

$teams = [
    ["name" => "Team A", "players" => 10],
    ["name" => "Team B", "players" => 10],
    ["name" => "Team C", "players" => 10],
    ["name" => "Team D", "players" => 10],
];

//echo '<pre>' , print_r(var_dump($teams)) , '</pre>';


function createMatchs(int $id, $_matchArr, $_teams , _match $lastm = null) {


    $DEBUG = true;


//    $t1 = new Team("team 1",10);
//    $t2 = new Team("team " . random_int(0,10),10);

//    foreach ($_teams as $team => $value) {
//        echo $value['name'];
//    }

    if(count($_teams) % 2 == 0) {
        for ($i = 0; $i < count($_teams); $i += 2) {
            if($DEBUG) {
                echo "name: " . $_teams[$i]['name'] . "  players : " . $_teams[$i]['players'] . "<br>";
                echo "name: " . $_teams[$i + 1]['name'] . "  players : " . $_teams[$i + 1]['players'] . "<br>";
            }
            $teama = new Team($_teams[$i]['name'], $_teams[$i]['players']);
            $teamb = new Team($_teams[$i + 1]['name'], $_teams[$i + 1]['players']);
            $match = null;
            if ($lastm == null) {
                $match = new _match($teama, $teamb, null);
            } else {
                $match = new _match($teama, $teamb, $lastm);
            }
            $_m = $match;
            $_m->score1 = random_int(1,5);
            $_m->score2 = random_int(1,5);
            if($i == 0) {
                $_matchArr[0] = $_m;
            } else {
                if($id != 0) {
                    $_matchArr[$i - 1 + $id] = $_m;
                } else {
                    $_matchArr[$i - 1] = $_m;
                }
            }
        }
    }
    return $_matchArr;
}

shuffle($teams);
$matches = createMatchs(0,$matches, $teams,null);
//$matches = createMatch(1,$teams,$matches,$matches[0]);
//$matches = createMatch(2,$teams,$matches,$matches[1]);
//$matches = createMatch(3,$teams,$matches,$matches[2]);


//echo '<pre>' , print_r(var_dump($matches)) , '</pre>';


foreach ($matches as $a) {

   $m = $a;
    echo "team name: " . $m->team1->name . " , team score: " . $m->score1 . "<br>";

}
