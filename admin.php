<!doctype html>
<html>
<head>
    <title>View Registration</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit-btn {
            background-color: #c69b6b;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }
        .edit-btn:hover {
            background-color: #45a049;
        }
        .delete-btn {
            background-color: #ff4444;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .delete-btn:hover {
            background-color: #ff0000;
        }
    </style>
</head>
<body>

<?php
$con = mysqli_connect("localhost", "root", "", "the1997db") or die(mysqli_connect_errno($con));

// Handle Delete
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // Check if it's the admin account
    $check_query = mysqli_query($con, "SELECT status FROM register WHERE id=$delete_id");
    $user_data = mysqli_fetch_array($check_query);
    
    if($user_data['status'] === 'ADMIN') {
        echo "<div style='color: red; margin-bottom: 20px;'>Cannot delete admin account!</div>";
    } else {
        mysqli_query($con, "DELETE FROM register WHERE id=$delete_id") or die(mysqli_error($con));
        echo "<div style='color: green; margin-bottom: 20px;'>Record deleted successfully!</div>";
    }
}

// Handle Update
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dateofbirth = $_POST['dateofbirth'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    
    $update_query = "UPDATE register SET 
        name='$name',
        dateofbirth='$dateofbirth',
        email='$email',
        phone='$phone',
        username='$username',
        password='$password',
        status='$status'
        WHERE id=$id";
    
    mysqli_query($con, $update_query) or die(mysqli_error($con));
    echo "<div style='color: green; margin-bottom: 20px;'>Record updated successfully!</div>";
}

if(isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $edit_query = mysqli_query($con, "SELECT * FROM register WHERE id=$edit_id") or die(mysqli_error($con));
    $edit_data = mysqli_fetch_array($edit_query);
    ?>
    <h2>Edit Registration</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
        <p>Name: <input type="text" name="name" value="<?php echo $edit_data['name']; ?>"></p>
        <p>Date of Birth: <input type="text" name="dateofbirth" value="<?php echo $edit_data['dateofbirth']; ?>"></p>
        <p>Email: <input type="email" name="email" value="<?php echo $edit_data['email']; ?>"></p>
        <p>Phone: <input type="text" name="phone" value="<?php echo $edit_data['phone']; ?>"></p>
        <p>Username: <input type="text" name="username" value="<?php echo $edit_data['username']; ?>"></p>
        <p>Password: <input type="password" name="password" value="<?php echo $edit_data['password']; ?>"></p>
        <p>Status: <input type="text" name="status" value="<?php echo $edit_data['status']; ?>"></p>
        <input type="submit" name="update" value="Update" class="edit-btn">
    </form>
    <?php
} else {
    $carian = mysqli_query($con, "SELECT * FROM register") or die(mysqli_error($con));

    echo "<h1>Senarai yang telah daftar</h1>";
    
    echo "<table>
        <tr>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th>Action</th>
        </tr>";
    
    while($data = mysqli_fetch_array($carian)) {
        echo "<tr>";
        echo "<td>{$data['name']}</td>";
        echo "<td>{$data['dateofbirth']}</td>";
        echo "<td>{$data['email']}</td>";
        echo "<td>{$data['phone']}</td>";
        echo "<td>{$data['username']}</td>";
        echo "<td>{$data['password']}</td>";
        echo "<td>{$data['status']}</td>";
        echo "<td>
                <a href='?edit_id={$data['id']}' class='edit-btn'>Edit</a>
                <a href='?delete_id={$data['id']}' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}

mysqli_close($con);
?>

</body>
</html>