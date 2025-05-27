<?php

$upload_dir = "../uploaded_files/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

if (!is_writable($upload_dir)) {
    die("Directory $upload_dir is not writable.");
}

$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
<?php
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token");
}
<input type="text" name="title" value="<?php echo htmlspecialchars($_POST['title'] ?? ''); ?>">
?>