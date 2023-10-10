<?php 
try{
    //$command = escapeshellcmd('chk.py');
    //echo "Helllo";
    $output = shell_exec('python C:\xampp\htdocs\NPISDevelopmentNew\resources\views\project\dashboard\chk.py');
    echo $output;
}
catch(\Throwable $th){
    echo $th;
}


?>

