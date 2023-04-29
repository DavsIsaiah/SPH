<?php
if (session_id() == "") {
    session_start();
}
if (isset($_POST['submit'])) {
    $err = "";
    if (!isset($_SESSION['user'])) {
        session_destroy();
        echo "<script>
        alert('You cannot adopt when not logged in.');
        window.location = 'Homepage.php';
        </script>";
        exit();
    }
    if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['legal_name'])) {
        $err = "Invalid format for legal name";
    }
    if ($err == "") {

        // Include config file
        require __DIR__ . '/vendor/autoload.php';
        include('connection.php');

        $id = $_POST['id'];
        $name = $_POST['name'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $spayed = $_POST['spayed'];
        $date = $_POST['date'];
        $postData = [
            'pet_id' => $id,
            'name' => $name,
            'breed' => $breed,
            'age' => $age,
            'sex' => $sex,
            'spayed' => $spayed,
            'date' => $date,
            'user' => $_SESSION['user'],
            'cat' => $_SESSION['cat'],
            'legal_name' => $_POST['legal_name'],
            'address' => $_POST['Address'],
            'facebook' => $_POST['Facebook'],
            'home' => $_POST['Home'],
            'length' => $_POST['length'],
            'allowed' => $_POST['allowed'],
            'adults' => $_POST['adults'],
            'child' => $_POST['child'],
            'adoption' => $_POST['adoption'],
            'move' => $_POST['move'],
            'willing' => $_POST['willing'],
            'responsible' => $_POST['responsible'],
            'income' => $_POST['Income'],
            'return' => $_POST['return'],
            'gift' => $_POST['gift'],
            'other' => $_POST['other'],
            'kept' => $_POST['kept'],
            'food' => $_POST['food'],
            'vet' => $_POST['vet'],
            'reason' => $_POST['reason'],
            'status' => "Pending"
        ]; //this is the schema
        $ref_table = "adopt";
        $fetch_data = $database->getReference($ref_table)
            ->orderByChild('pet_id')
            ->equalTo($id)
            ->getValue();
        if ($fetch_data > 0) {
            foreach ($fetch_data as $key => $row) {
                if ($row['date'] == $date) {
                    $alert = "Please choose a different date!";
                    break;
                }
                if ($alert != "")
                    $alert = "";
            }
        }
        if (!isset($alert)) {
            $database->getReference($ref_table)->push($postData);
            header("Location: Homepage.php");
        }
    }else{
        echo "<script>alert('$err');</script>";
    }
}

?>