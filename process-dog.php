<?php
if (isset($_POST['submit'])) {
    $err ="";
    if (isset($_FILES['image'])) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
            $err = "Invalid format for name";
        }
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['breed'])) {
            $err = "Invalid format for breed";
        }
        if ($err == "") {

            require __DIR__ . '/vendor/autoload.php';
            include('connection.php');

            $storage = $factory->createStorage();
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }

            if (empty($errors) == true) {
                $name = time() . $_FILES['image']['name'];
                $bucket->upload(
                    file_get_contents($_FILES['image']['tmp_name']),
                    [
                        'name' => $name,
                        'type' => "image/" . $file_ext
                    ]
                );
                $url = "https://firebasestorage.googleapis.com/v0/b/safepetshaven.appspot.com/o/" . $name . "?alt=media";
                //look at the largest pet id for the dog
                $ref_table = "dog_images";
                $fetch_data = $database->getReference($ref_table)
                    ->orderByChild('pet_id')
                    ->limitToLast(1)
                    ->getValue();
                if ($fetch_data > 0) {
                    foreach ($fetch_data as $key => $row) {
                        $pet_id = $row['pet_id'] + 1;
                    }
                } else {
                    $pet_id = 1;
                }
                //pass to the firebase database.
                $age = $_POST['age'] . " " . $_POST['date'];
                $postData = [
                    'age' => $age,
                    'breed' => $_POST['breed'],
                    'name' => $_POST['name'],
                    'pet_id' => $pet_id,
                    'sex' => $_POST['sex'],
                    'status' => "Available",
                    'url' => $url
                ]; //this is the schema
                $database->getReference($ref_table)->push($postData);
                header("Location: animals_admin.php");
            } else {
                print_r($errors);
            }
        } else {
            echo "<script>alert('$err');</script>";
        }
    }

}

?>