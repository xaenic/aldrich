<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
        include("config.php");

        if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$idno = $_POST['idno'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);

            // Verify unique email
            $verify_query = mysqli_query($con, "SELECT email FROM student WHERE email='$email'");
            if(mysqli_num_rows($verify_query) != 0 ){
                echo "<div class='message'>
                        <p>This email is already in use. Please try another one.</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            } else {
                    // Corrected SQL query with backticks for column names
                    $insert_query = "INSERT INTO student (email, idno, fname, mname, lname, age, gender, contact,address, password) VALUES ('$email', '$idno', '$fname', '$mname', '$lname', '$age', '$gender', '$contact', '$address', '$password')";
                    
                    if(mysqli_query($con, $insert_query)) {
                        echo "<div class='message'>
                                <p>Registration successful!</p>
                            </div> <br>";
                        echo "<a href='index.php' class='btn-container'><button class='btn'>Login Now</button>";
                    } else {
                        echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
                    }
                }
        } else {
  
        ?>


            <header>Sign Up</header>
            <form action="" method="post">
				<div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

				<div class="field input">
                    <label for="idno">Id Number</label>
                    <input type="number" name="idno" id="idno" autocomplete="off" required>
                </div>
			
                <div class="field input">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="mname">Middle Name</label>
                    <input type="text" name="mname" id="mname" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" id="gender" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="contact">Contact No</label>
                    <input type="number" name="contact" id="contact" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>