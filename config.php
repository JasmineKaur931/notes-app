<?php
/* Database configuration
user="root"
password="" */
define('DB_SERVER', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','project');

//Connect to database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check connection
if($conn == false){
    dir('Error: Error in Connection');
    
}
?>