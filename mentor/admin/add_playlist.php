<?php
include '../components/connect.php';

if (isset($_COOKIE['tutor_id'])) {
    $tutor_id = $_COOKIE['tutor_id'];
} else {
    $tutor_id = '';
    header('location:login.php');
    exit;
}

$message = [];

if (isset($_POST['submit'])) {
    $id = unique_id();
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    // Define upload directory (absolute path for reliability)
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/mc/mentor/uploaded_files/";
    
    // Create directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Check if directory is writable
    if (!is_writable($upload_dir)) {
        $message[] = 'Error: Upload directory is not writable!';
    } else {
        // Handle file upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_size = $_FILES['image']['size'];

            // Validate file type and size
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $image_mime = mime_content_type($image_tmp_name);
            if (!in_array($image_mime, $allowed_types)) {
                $message[] = 'Invalid image type! Only JPEG, PNG, and GIF are allowed.';
            } elseif ($image_size > 2 * 1024 * 1024) { // 2MB limit
                $message[] = 'Image is too large! Maximum size is 2MB.';
            } else {
                // Generate unique filename
                $ext = pathinfo($image_name, PATHINFO_EXTENSION);
                $rename = unique_id() . '.' . $ext;
                $image_folder = $upload_dir . $rename;

                // Move the uploaded file
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    // Insert into database only if file move succeeds
                    $add_playlist = $conn->prepare("INSERT INTO `playlist` (id, tutor_id, title, description, thumb, status) VALUES (?, ?, ?, ?, ?, ?)");
                    $add_playlist->execute([$id, $tutor_id, $title, $description, $rename, $status]);
                    $message[] = 'New playlist created!';
                } else {
                    $message[] = 'Failed to upload image!';
                }
            }
        } else {
            $message[] = 'No image uploaded or upload error!';
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
   <title>Add Playlist</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="playlist-form">
   <h1 class="heading">Create Playlist</h1>

   <?php
   if (!empty($message)) {
       foreach ($message as $msg) {
           echo '<p class="message">' . htmlspecialchars($msg) . '</p>';
       }
   }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <p>Playlist Status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="" disabled>-- Select status</option>
         <option value="active">Active</option>
         <option value="deactive">Deactive</option>
      </select>
      <p>Playlist Title <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="Enter playlist title" class="box">
      <p>Playlist Description <span>*</span></p>
      <textarea name="description" class="box" required placeholder="Write description" maxlength="1000" cols="30" rows="10"></textarea>
      <p>Playlist Thumbnail <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">
      <input type="submit" value="Create Playlist" name="submit" class="btn">
   </form>
</section>

<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>