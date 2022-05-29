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

echo '<pre>' , print_r(var_dump($teams)) , '</pre>';


function createMatch(int $id, $_matchArr, $_teams , _match $lastm = null) {
//    $t1 = new Team("team 1",10);
//    $t2 = new Team("team " . random_int(0,10),10);

    for($i = 0; $i < count($_teams); $i += 2) {
        $a = null;
        $t1 = new Team($_teams[$i][0]->name, $_teams[$i][1]->players);
        $t2 = new Team($_teams[$i+1][0]->name, $_teams[$i+1][1]->players);
        if(is_null($lastm)) {
            $a = new _match($t1,$t2);
        } else {
            $a = new _match($t1,$t2,$lastm);
        }
        $_matchArr[$id] = $a;
        $id += 1;
    }


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


$matches = createMatch(0,$teams,$matches);
//$matches = createMatch(1,$teams,$matches,$matches[0]);
//$matches = createMatch(2,$teams,$matches,$matches[1]);
//$matches = createMatch(3,$teams,$matches,$matches[2]);


//echo '<pre>' , print_r(var_dump($matches[1])) , '</pre>';


foreach ($matches as $a => $value) {

    echo "{{{{ <br>";
    foreach ($value as $qq => $qv) {
        echo $qq . "<br>";
    }
    echo "}}}} <br>";

    echo "{ ";

//    echo "Match : " . $value->id;
//    echo("<br>" . $value . '<br>');

//    if($value->lastMatch != null) {
//        foreach ($value as $b => $vb) {
//            echo("Match [ " . $vb . " ] <br>");
////            echo("[ LAST MATCH(S) = " . $vb . " ] <br>");
//        }
//    }
    echo " }";
    echo '<br>';
}
