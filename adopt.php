<?php
if (session_id() == "") {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adopt Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style3.css" />  
    <link rel="stylesheet" href="adopt.css" /> 

    <style>
    </style>
</head>
<body>
<?php require_once('header.php');?>
    <br><br>
	<div class="container margin">
		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6">
				<div class="card p-5">
					<div class="card-header">
						<h3 class="text-center h3">Pet Adoption Form</h3>
					</div>
					<div class="card-body">
						<form method="post" action="process_form.php" style="padding-bottom:20px;">
                            <div class="mb-3">
								<center><label for="" class="title">Pet Information for Adoption</label></center>
							</div>
							<div class="mb-3">
								<label for="pet_id" class="form-label">Pet ID:</label>
								<input type="text" placeholder="Enter pet ID" name="pet_id" id="pet_id" class="form-control">
							</div>
							<div class="mb-3">
								<label for="pet_name" class="form-label">Pet Name:</label>
								<input type="text" placeholder="Enter pet name" name="pet_name" id="pet_name" class="form-control">
							</div>
                            <div class="mb-3">
								<center><label for="" class="title">Your Information</label></center>
							</div>
							<div class="mb-3">
								<label for="name" class="form-label">Name:</label>
								<input type="text" placeholder="Enter your name" name="name" id="name" class="form-control">
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email Address:</label>
								<input type="email" placeholder="Enter your email" name="email" id="email" class="form-control">
							</div>
							<div class="mb-3">
								<label for="phone" class="form-label">Contact Number:</label>
								<input type="tel" placeholder="Enter your phone number" name="phone" id="phone" class="form-control">
							</div>
                            <div class="mb-3">
								<center><label for="" class="title">Schedule for Appointment</label></center>
							</div>
							<div class="mb-3">
								<label for="date" class="form-label">Appointment date:</label>
								<input type="date" id="date" name="date" class="form-control" style="margin-bottom: 30px;">
							</div>
							<div class="d-grid">
								<button type="submit" class="button">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
