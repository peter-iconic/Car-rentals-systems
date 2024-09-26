<?php
include 'config.php';
include 'header.php';


// Handle addition of new client
if (isset($_POST['add_client'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['address'];
    $phoneNo = $_POST['phone_no'];
    $emailAddress = $_POST['email_address'];
    $sql = "INSERT INTO Client (firstName, lastName, address, phoneNo, emailAddress) VALUES ('$firstName', '$lastName', '$address', '$phoneNo', '$emailAddress')";
    $conn->query($sql);
}

// Handle deletion of client
if (isset($_GET['delete_client'])) {
    $clientNo = $_GET['delete_client'];
    $sql = "DELETE FROM Client WHERE clientNo=$clientNo";
    $conn->query($sql);
}

// Fetch all clients
$clients = $conn->query("SELECT * FROM Client");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Vehicle Rental System</title>
</head>

<body>
    <h1>Admin Panel - Manage Clients</h1>
    <form method="POST">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="phone_no" placeholder="Phone No" required>
        <input type="email" name="email_address" placeholder="Email" required>
        <button type="submit" name="add_client">Add Client</button>
    </form>

    <h2>Existing Clients</h2>
    <table border="1">
        <tr>
            <th>Client No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $clients->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['clientNo']; ?></td>
                <td><?php echo $row['firstName']; ?></td>
                <td><?php echo $row['lastName']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['phoneNo']; ?></td>
                <td><?php echo $row['emailAddress']; ?></td>
                <td>
                    <a class="a" href="?edit_client=<?php echo $row['clientNo']; ?>">Edit</a>
                    <a class="a" href="?delete_client=<?php echo $row['clientNo']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php
    require 'footer.html';
    ?>
</body>

</html>