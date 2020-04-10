<pre>
<?php
$a1 = array(1,2,3,4,5,6,7,8,9,10);
print_r($a1);

$a2 = array_map(function($x){return $x*$x;}, $a1);
print_r($a2);

$a3=[];
foreach($a1 as $value){
    $a3[] = $value*$value;
}
print_r($a3);


function speed_test($fun, $arg, $n=10000){
    $time1 = microtime(TRUE);
    for ($i=0; $i < $n; $i++){
        $fun($arg);
    }
    $time2 = microtime(true);

    return $time2 - $time1;
}

function test1($array)
{
    return array_map(function ($x) {
        return $x * $x;
    }, $array);
};

function test2($array)
{
    $a = [];
    foreach ($array as $value) {
        $a[] = $value * $value;
    }
    return $a;
};

function test3($array)
{
    $a = [];
    for ($i = 0; $i < count($array); $i++) {
        $a[] = $array[$i] * $array[$i];
    }
    return $a;
};

echo speed_test("test1", $a1);
echo "<br>";
echo speed_test("test2", $a1);
echo "<br>";
echo speed_test("test3", $a1);
?>
</pre>