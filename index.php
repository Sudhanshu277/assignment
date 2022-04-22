<?php include 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-top: 26px;">
        <div>
            <form method="post" enctype="multipart/form-data" action="insert.php">
                <div>
                    <label>Choose file</label><br><br>
                    <input type="file" name="file" >
                    <button type="submit" name="submit" class="btn btn-info">Import</button>
                </div>
            </form>
        </div>
    </div>




    <?php
    include 'dbcon.php';
    $sqlselect = "SELECT *, COUNT(brand_name) as 'c'  FROM data GROUP BY brand_name ";
    $i = 1;
    $result = mysqli_query($conn, $sqlselect);
    if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>
                                    <form method="post" action="export.php">
                                        <input type="submit" name="export" value="Export " class="btn btn-info" />
                                    </form>
                                </th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Brand Name</th>
                                <th>Model Name</th>
                                <th>Condition Name</th>
                                <th>Grade Name</th>
                                <th>Gb Spec Name</th>
                                <th>Colour Name</th>
                                <th>Network Name</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['brand_name']; ?></td>
                                    <td><?php echo $row['model_name']; ?></td>
                                    <td><?php echo $row['condition_name'] ?></td>
                                    <td><?php echo $row['grade_name'] ?></td>
                                    <td><?php echo $row['gb_spec_name'] ?></td>
                                    <td><?php echo $row['colour_name'] ?></td>
                                    <td><?php echo $row['network_name'] ?></td>
                                    <td><?php echo $row['c']; ?></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    <?php }
    ?>

</body>

</html>