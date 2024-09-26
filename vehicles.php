<?php
include 'config.php';
include 'header.php';

// Handle addition of new vehicle
if (isset($_POST['add_vehicle'])) {
    $vehLicenseNo = $_POST['veh_license_no'];
    $vehicleMake = $_POST['vehicle_make'];
    $vehicleModel = $_POST['vehicle_model'];
    $color = $_POST['color'];
    $noDoors = $_POST['no_doors'];
    $capacity = $_POST['capacity'];
    $hireRate = $_POST['hire_rate'];
    $outletNo = $_POST['outlet_no'];
    $sql = "INSERT INTO Vehicle (vehLicenseNo, vehicleMake, vehicleModel, color, noDoors, capacity, hireRate, outletNo) VALUES ('$vehLicenseNo', '$vehicleMake', '$vehicleModel', '$color', '$noDoors', '$capacity', '$hireRate', '$outletNo')";
    $conn->query($sql);
}

// Handle deletion of vehicle
if (isset($_GET['delete_vehicle'])) {
    $vehLicenseNo = $_GET['delete_vehicle'];
    $sql = "DELETE FROM Vehicle WHERE vehLicenseNo='$vehLicenseNo'";
    $conn->query($sql);
}

// Fetch all vehicles
$vehicles = $conn->query("SELECT * FROM Vehicle");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Manage Vehicles</title>
</head>

<body>
    <h1>Admin Panel - Manage Vehicles</h1>
    <form method="POST">
        <input type="text" name="veh_license_no" placeholder="License No" required>
        <input type="text" name="vehicle_make" placeholder="Make" required>
        <input type="text" name="vehicle_model" placeholder="Model" required>
        <input type="text" name="color" placeholder="Color" required>
        <input type="number" name="no_doors" placeholder="No. of Doors" required>
        <input type="number" name="capacity" placeholder="Capacity" required>
        <input type="number" step="0.01" name="hire_rate" placeholder="Hire Rate" required>
        <input type="number" name="outlet_no" placeholder="Outlet No" required>
        <button type="submit" name="add_vehicle">Add Vehicle</button>
    </form>

    <h2>Existing Vehicles</h2>
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
            <th>Actions</th>
        </tr>
        <?php while ($row = $vehicles->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['vehLicenseNo']; ?></td>
                <td><?php echo $row['vehicleMake']; ?></td>
                <td><?php echo $row['vehicleModel']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td><?php echo $row['noDoors']; ?></td>
                <td><?php echo $row['capacity']; ?></td>
                <td><?php echo $row['hireRate']; ?></td>
                <td><?php echo $row['outletNo']; ?></td>
                <td>
                    <a href="?edit_vehicle=<?php echo $row['vehLicenseNo']; ?>">Edit</a>
                    <a href="?delete_vehicle=<?php echo $row['vehLicenseNo']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php
    require 'footer.html';
    ?>
</body>

</html>