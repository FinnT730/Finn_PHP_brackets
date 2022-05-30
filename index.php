<?php

include "_match.php";



global $matches;
$matches = [];

$teams = [
    ["name" => "Team A", "players" => 10],
    ["name" => "Team B", "players" => 3],
    ["name" => "Team C", "players" => 5],
    ["name" => "Team D", "players" => 7],
];

//echo '<pre>' , print_r(var_dump($teams)) , '</pre>';

$count = count($teams);
for($i = 0; $i < 1020; $i++) {
    $teams[$count + $i] = ["name" => "Team _" . $i, "players" => $i];
}

function isPowerOf2($n) {
    if ($n == 0)
        return 0;
    while ($n != 1)
    {
        if ($n%2 != 0)
            return 0;
        $n = $n/2;
    }
    return 1;
}


function createMatchs(int $id, $_matchArr, $_teams , _match $lastm = null) {


    $DEBUG = false;


//    $t1 = new Team("team 1",10);
//    $t2 = new Team("team " . random_int(0,10),10);

//    foreach ($_teams as $team => $value) {
//        echo $value['name'];
//    }

    if(isPowerOf2(count($_teams))) {
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
            $_m->id = $id;
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



function rematch($id, $matches, _match $lastm = null) {

//    echo sprintf("team name: %s , team score: %s<br>", $lastm->team1->name, $lastm->score1);
//    echo sprintf("team name: %s , team score: %s<br>", $lastm->team2->name, $lastm->score2);
//
//    if($lastm->score1 < $lastm->score2) {
//        echo $lastm->team1->name . " SCORED LESS!!! <br>";
//    }

    for($i = 0; $i < count($matches); $i += 2) {
        $offset = null;
        if($i == 0) {
            $offset = 0;
        } else {
            $offset = 1;
        }
        if($matches[$i - $offset]->score1 < $lastm->score1) {
            $_m = new _match($matches[$i - $offset]->team1, $lastm->team1);
            $matches[$i - $offset]->lastMatch = $_m;
        }
    }


//    for($i = 0; $i < count($matches); $i += 2) {
//        $m =  null;
//        if($i == 0) {
////            echo $matches[$i];
//            $m = $matches[$i];
//        } else {
////            echo $matches[$i - 1];
//            $m = $matches[$i - 1];
//        }
////        echo "ID: " . $i . "          " .  $m->team1->name . "<br>";
////        echo "ID: " . $i . "          " .  $m->team2->name . "<br>";
//
//
//
//
//
////        if($lastm != null) {
////            if ($m->score1 < $m->score2) {
////                if ($lastm->score1 < $lastm->score2) {
////                    $_m = new _match($m->team1, $lastm->team1, $matches[$i - 1]);
////                    $_size = count($matches) + 1;
////                    $matches[$_size] = $_m;
////                    echo($m->team1 . " has the lowest in round 1 <br>");
////                    echo($lastm->team1 . " has the lowest in round 1 <br>");
////
////                }
////            }
////        }
//
//
//    }

    return $matches;
    
//    foreach ($matches as $a) {
//
//        $m = $a;
//        echo "team name: " . $m->team1->name . " , team score: " . $m->score1 . "<br>";
//        echo "team name: " . $m->team2->name . " , team score: " . $m->score2 . "<br>";
//
//        if($m->score1 < $m->score2) {
//            echo $m->team1->name . " SCORED LESS!!! <br>";
//        }
//    }
}


shuffle($teams);
$matches = createMatchs(0,$matches, $teams,null);
//$matches = createMatchs(1,$teams,$matches,$matches[0]);
//$matches = createMatch(2,$teams,$matches,$matches[1]);
//$matches = createMatch(3,$teams,$matches,$matches[2]);


//echo '<pre>' , print_r(var_dump($matches)) , '</pre>';


$matches = rematch(0,$matches,$matches[0]);
$matches = rematch(1,$matches,$matches = rematch(2,$matches,$matches[1])[0]);
$matches = rematch(2,$matches,rematch(2,$matches,rematch(1,$matches,$matches = rematch(3,$matches,$matches[3])[0])[0])[0]);

//echo '<pre>' , print_r(var_dump($matches)) , '</pre>';


//echo(json_encode($matches));


foreach ($matches as $a) {
    $m = $a;
    if($m->lastMatch != null) {
        echo "{<br>";
//        echo $m->lastMatch->team1;
//        echo $m->lastMatch->team1;
        $depth = 0;
        while($m->lastMatch->lastMatch != null) {
            $depth += 1;
        }
        echo $depth;
        echo "}<br>";
    }
}

//
//foreach ($matches as $a) {
//
//   $m = $a;
//    echo "<br>team name: " . $m->team1->name . " , team score: " . $m->score1 . "<br>";
//
//}
