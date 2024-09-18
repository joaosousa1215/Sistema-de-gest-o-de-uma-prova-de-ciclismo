<?php
$servername = 'ave.dee.isep.ipp.pt';
$username = '1201034';
$dbpassword = 'MWY2MzMxMDdiMWQ2';
$dbname = '1201034';

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids = $_POST['id'];
    $names = $_POST['name_sign_up'];
    $emails = $_POST['email_sign_up'];
    $roles = $_POST['role'];

    foreach ($ids as $index => $id) {
        $name = $conn->real_escape_string($names[$index]);
        $email = $conn->real_escape_string($emails[$index]);
        $role = $conn->real_escape_string($roles[$index]);

        if (empty($id)) {
            // Add new record
            $sql = "INSERT INTO registration_sign_up (name_sign_up, email_sign_up, Role) VALUES ('$name', '$email', '$role')";
        } else {
            // Check if the ID exists
            $checkIdQuery = "SELECT id FROM registration_sign_up WHERE id='$id'";
            $checkResult = $conn->query($checkIdQuery);

            if ($checkResult->num_rows > 0) {
                // Update existing record
                $sql = "UPDATE registration_sign_up SET name_sign_up='$name', email_sign_up='$email', Role='$role' WHERE id=$id";
            } else {
                // Add new record with specified ID
                $sql = "INSERT INTO registration_sign_up (id, name_sign_up, email_sign_up, Role) VALUES ('$id', '$name', '$email', '$role')";
            }
        }
        $conn->query($sql);
    }

    }

        // Handle deletions (removes records not present in the form)
        $existingIds = array_filter($ids);
        if (!empty($existingIds)) {
            $existingIds = implode(',', array_map('intval', $existingIds));
            $sql = "DELETE FROM registration_sign_up WHERE id NOT IN ($existingIds)";
            $conn->query($sql);
        }

    header("Location: Administrador.php");


$conn->close();
?>
