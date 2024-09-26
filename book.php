<?php include 'config.php';
include 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Available Vehicles</title>
</head>

<body>
    <h2>Available Vehicles for Rent</h2>
    <table border="1">
        <tr>
            <th>License No</th>
            <th>Make</th>
            <th>Model</th>
            <th>Color</th>
            <th>No. of Doors</th>
            <th>Capacity</th>
            <th>Hire Rate</th>
            <th>Outlet No</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM Vehicle");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['vehLicenseNo']}</td>
                <td>{$row['vehicleMake']}</td>
                <td>{$row['vehicleModel']}</td>
                <td>{$row['color']}</td>
                <td>{$row['noDoors']}</td>
                <td>{$row['capacity']}</td>
                <td>{$row['hireRate']}</td>
                <td>{$row['outletNo']}</td>
            </tr>";
        }
        ?>
    </table>

    <?php
    require 'footer.html';
    ?>
</body>

</html>