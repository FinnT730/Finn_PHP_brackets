<?php

include "_match.php";



global $matches;
$matches = [];


function createMatch(int $id, $_matchArr, _match $lastm = null) {
    $t1 = new Team("team 1",10);
    $t2 = new Team("team " . random_int(0,10),10);
    $a = null;
    if(is_null($lastm)) {
        $a = new _match($t1,$t2);
    } else {
        $a = new _match($t1,$t2,$lastm);
    }
//    $a = new _match($t1,$t2);
    $_matchArr[$id] = $a;

    return $_matchArr;
}


$matches = createMatch(0,$matches);
$matches = createMatch(1,$matches,$matches[0]);
$matches = createMatch(2,$matches,$matches[1]);
$matches = createMatch(3,$matches,$matches[2]);


//echo '<pre>' , print_r(var_dump($matches[1])) , '</pre>';


foreach ($matches as $a => $value) {
    echo "Match : " . $value->id;
    echo("<br>" . $value->team2 . '<br>');
}
