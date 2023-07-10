<?php
session_start();
if(isset($_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php practice </title>
</head>
<body>
    <?php
$name="Antenhe_Sileshi";
echo "<p>bro my name is $name</p>";
$na="hello";
echo "MAN \"$na\" ";
echo'bro my name is $name';
$x=4;
function bro(){
   $x=0;
    echo"\$x in this value in function is $x";
}
// echo"\$x in this value out function is $x";
// bro();
$glob=4;
function sum(){
 static $glob=NULL;
$glob++;
echo"Number is $glob";
}
// for($i=0;$i<$glob;$i++){
 // echo "$i<br>"; 
// $store=mt_rand($i,$glob);   
// echo"the value up  and down is $store";
// }
// sum();
// define("man",50);
// echo man;
// echo constant("man");
$number=1234.83838;
$num=number_format($number);
echo" <br>$num";
$num1=pow(4,4);
echo"<br>$num1";
// for concatination
$h="hello ";
$a="Antenhe_sileshi";
echo  $h." ".$a;
// dub string copy ma]
$file="hello men my name is antenhe sileshi kassya";
echo"<br>";
echo substr($file,2);//or we store it variable but starting point is 0
// string position or strpos() is best used for ...
echo strpos("antenhe","h");
$d=date("monday");
if($d=="monday"){
    echo"bro monday";
}else{
    echo"error";
}
?>
<html><body>
<?php
echo "<h1>Multiplication table</h1>";
echo "<table border=2 width=50% >";
for ($i = 1; $i <= 5; $i++ ) {   //this is the outer loop
  echo "<tr>";
  echo "<td>".$i."</td>";
    for ( $j = 2; $j <= 5; $j++ ) { // inner loop
        echo "<td>".$i * $j."</td>";
    }
   echo "</tr>";
}
echo "</table>";

// $arrayN = array(1,2,3,4,5,6,7,8,9);
// foreach($arrayN as $value){
//     if($value==3)continue;
//     echo "all of the values are";
//     echo $value;
// }
// $person= array("name"=>"jone","age"=>12);
// echo $person['name'];


// // <!-- this is used to find Grade point of viewport -->
// $creadit=array("SI"=>3,"ADB"=>3,"W2"=>3,"ASS"=>3,"RE"=>3,"C#"=>3,"TOOLS"=>3);
// $total_credit=array("SI"=>12,"ADB"=>12,"W2"=>12,"ASS"=>12,"RE"=>12,"C#"=>12,"TOOLS"=>12);
// $your=array("SI"=>3,"ADB"=>3,"W2"=>3,"ASS"=>3,"RE"=>3,"C#"=>3,"TOOLS"=>3);
// foreach($credit as $value){
//     $creadit+=$value;
//     foreach()
// }
$data=array(12,43,455,67,8);
$str=sort($data);
function add_sub($var1,$var2){
    $sum=$var1+$var2;
    $sub=$var1-$var2;
    return array($sum,$sub);
}
// $s=add_sub(30,20);

list($add0,$sub0)= array($sum,$sub);
echo ":num".$add0." <br>";
echo ":num".$sub0." <br>";  
}
else{
    header('location:login.php');
}
?>              
</body>
</html>

