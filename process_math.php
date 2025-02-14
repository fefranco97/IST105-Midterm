<?php
    $num1 = escapeshellarg($_POST["num1"]);
    $num2 = escapeshellarg($_POST["num2"]);
    $oper = escapeshellarg($_POST["oper"]);
    
    $command = "python3 math_operations.py $num1 $num2 $oper";
    $output = shell_exec($command);
    
    echo $output;
?>