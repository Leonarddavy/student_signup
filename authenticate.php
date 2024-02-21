<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <script src="validate.js" crossorigin="anonymous"></script>
    <title>Student Information Inquiry</title>
</head>

<body>

    <div class="container">
        <h1>Student Information Inquiry</h1>
        <form method="post" class="search-form">
            <div class="input-field">
                <label for="search">Enter Registration Number:</label>
                <input type="text" id="search" name="search" 
                oninput="capitalizeRegistrationNumber(this)" 
                placeholder="Reg. no" />
            </div>
            <button type="submit" name="submit">Search</button>
        </form>
        <div class="result-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Email</th>
                        <th>Reg. Number</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])) {
                        $search = $_POST['search'];

                        $sql = "SELECT * FROM `signup` WHERE regnumber='$search'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['regnumber'] . "</td>";
                                    echo "<td>" . $row['phonenumber'] . "</td>";
                                    echo "</tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td colspan='4'>No data found</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Error: " . mysqli_error($conn) . "</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
