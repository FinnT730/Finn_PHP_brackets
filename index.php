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
                $_matchArr[$i - 1] = $_m;
            }
        }
    }


//    for($i = 0; $i < count($_teams); $i += 2) {
//        $a = null;
//        $t1 = new Team($_teams[$i][0]->name, $_teams[$i][1]->players);
//        $t2 = new Team($_teams[$i+1][0]->name, $_teams[$i+1][1]->players);
//        if(is_null($lastm)) {
//            $a = new _match($t1,$t2);
//        } else {
//            $a = new _match($t1,$t2,$lastm);
//        }
//        $_matchArr[$id] = $a;
//        $id += 1;
//    }


//
//    $a = null;
//    if(is_null($lastm)) {
//        $a = new _match($t1,$t2);
//    } else {
//        $a = new _match($t1,$t2,$lastm);
//    }
//    $a = new _match($t1,$t2);
//    $_matchArr[$id] = $a;

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
//   echo $m->score1 . "<br>";
    echo "team name: " . $m->team1->name . " , team score: " . $m->score1 . "<br>";

//    echo "{{{{ <br>";
//    foreach ($value as $qq => $qv) {
//        echo $qq . "<br>";
//    }
//    echo "}}}} <br>";
//
//    echo "{ ";

//    echo "Match : " . $value->id;
//    echo("<br>" . $value . '<br>');

//    if($value->lastMatch != null) {
//        foreach ($value as $b => $vb) {
//            echo("Match [ " . $vb . " ] <br>");
////            echo("[ LAST MATCH(S) = " . $vb . " ] <br>");
//        }
//    }
//    echo " }";
//    echo '<br>';
}
