<?php
include 'dbcon.php';

if(isset($_POST['export']))
{
    header('Content-Type:text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename= data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('Id','BrandName', 'model_name' , 'condition_name' , 'grade_name' , 'gb_spec_name' , 'colour_name' , 'network_name' ,'count'));
    $query = "SELECT *, COUNT(brand_name) as 'c'  FROM data GROUP BY brand_name HAVING COUNT(brand_name) > 1 ";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_row($result))
    {
        fputcsv($output,$row);
    }
    fclose($output);
}
?>