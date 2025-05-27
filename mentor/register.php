<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $id = unique_id();
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = unique_id() . '.' . $ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_files/' . $rename;

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = 'Invalid email format!';
    } elseif (!checkdnsrr(array_pop(explode("@", $email)), "MX")) {
        $message[] = 'Invalid email domain!';
    } elseif ($pass !== $cpass) {
        $message[] = 'Passwords do not match!';
    } elseif (!in_array(strtolower($ext), ['jpg', 'jpeg', 'png'])) {
        $message[] = 'Only JPG, JPEG, and PNG files are allowed!';
    } elseif ($image_size > 2 * 1024 * 1024) { // Limit file size to 2MB
        $message[] = 'Image size should not exceed 2MB!';
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $select_user->execute([$email]);

        if ($select_user->rowCount() > 0) {
            $message[] = 'Email already taken!';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
            $insert_user->execute([$id, $name, $email, $hashed_pass, $rename]);

            if (move_uploaded_file($image_tmp_name, $image_folder)) {
                $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
                $verify_user->execute([$email]);
                $row = $verify_user->fetch(PDO::FETCH_ASSOC);

                if ($verify_user->rowCount() > 0) {
                    setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
                    header('location:home.php');
                    exit();
                }
            } else {
                $message[] = 'Failed to upload the image!';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- Custom CSS File Link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Create Account</h3>
      <?php
      if (isset($message)) {
          foreach ($message as $msg) {
              echo "<p class='error'>$msg</p>";
          }
      }
      ?>
      <div class="flex">
         <div class="col">
            <p>Your Name <span>*</span></p>
            <input type="text" name="name" placeholder="Enter your name" maxlength="50" required class="box">
            <p>Your Email <span>*</span></p>
            <input type="email" name="email" placeholder="Enter your email" maxlength="50" required class="box">
         </div>
         <div class="col">
            <p>Your Password <span>*</span></p>
            <input type="password" name="pass" placeholder="Enter your password" maxlength="20" required class="box">
            <p>Confirm Password <span>*</span></p>
            <input type="password" name="cpass" placeholder="Confirm your password" maxlength="20" required class="box">
         </div>
      </div>
      <p>Select Profile Picture <span>*</span></p>
      <input type="file" name="image" accept="image/png, image/jpeg" class="box">
      <p class="link">Already have an account? <a href="login.php">Login now</a></p>
      <input type="submit" name="submit" value="Register Now" class="btn">
   </form>

</section>

<?php include 'components/footer.php'; ?>

<!-- Custom JS File -->
<script src="js/script.js"></script>
   
</body>
</html>