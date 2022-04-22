<?php
include 'dbcon.php';

if(isset($_POST["submit"])){
    $fileName = $_FILES["file"]["tmp_name"];
    
    if($_FILES["file"]["size"] > 0){
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv ($file, 1000, ",")) !== FALSE) {
            $sqlInsert = "INSERT INTO data (brand_name , model_name , condition_name , grade_name , gb_spec_name , colour_name , network_name) values ('" . $column[0] . "','" . $column [1] . "','" . $column [2] . "','" . $column [3] . "','" . $column [4] . "','" . $column [5] . "','" . $column [6] . "')";
            $result = mysqli_query($conn, $sqlInsert);
            if(!empty($result)) {
                header('Location:index.php ');
                // echo "CSV Data Imported into the database";
            }else{
            echo "Problem in importing";
        }
    }
}
}
?>