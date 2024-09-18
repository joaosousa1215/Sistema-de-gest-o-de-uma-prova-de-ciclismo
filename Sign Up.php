    <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_sign_up = $_POST['name_sign_up'];
    $email_sign_up = $_POST['email_sign_up'];
    $password_sign_up = $_POST['password_sign_up'];
    $role = 0;

    // Verifica se email e password não estão vazios
    if (empty($name_sign_up) || empty($email_sign_up) || empty($password_sign_up)) {
        echo "Nome, email e password são obrigatórios!";
        exit;
    }

    $hashed_password = password_hash($password_sign_up, PASSWORD_DEFAULT);

    // Database connection
    $servername = 'ave.dee.isep.ipp.pt';
    $username = '1201034';
    $dbpassword = 'MWY2MzMxMDdiMWQ2';
    $dbname = '1201034';

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration_sign_up (name_sign_up, email_sign_up, password_sign_up, Role) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssss", $name_sign_up, $email_sign_up, $hashed_password, $role); //ssss é o número de parâmetros
        $execval = $stmt->execute();

        if ($execval) {
            echo "<script>window.location.href = 'Interface Inicial.html'</script>";
        } else {
            echo "Falha no registo: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
