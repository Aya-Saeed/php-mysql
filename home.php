<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    // query
    $conn = mysqli_connect("localhost", "root", "306306ay", "website");
    if (!$conn) {
        echo 'failed';
    }
    $data = mysqli_query($conn, "select * from user");
    // var_dump($data);
    if (mysqli_num_rows($data) > 0) {
        echo "<table border='1'>
             <tr>
             <th>#</th>

             <th>user name</th>
             <th>email</th>
             <th>phone</th>
           
             </tr>";

        while ($row = mysqli_fetch_assoc($data)) {
            // var_dump($row);
            echo "<tr>
                    <td> {$row['id']}</td>
                    <td> {$row['username']}</td>
                    <td> {$row['email']}</td>
              
                
                    <td> {$row['phone']}</td>
                    <td><a href='delete.php?id={$row['id']}'>delete</a></td>
                    <td><a href='add.php'>add</a></td>
                    <td><a href='update.php?id={$row['id']}'>update</a></td>
                    <td><a href='show.php?id={$row['id']}'>show</a></td>
                    </tr>";
        };
        echo "</table>";
    };
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>