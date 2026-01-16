<?php
include "./autoloader.php";
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = Database::get_database();
  $success = $db->add_lead($_POST['surname'], $_POST['firstname'], $_POST['email'], $_POST['phone']);
}
if ($success) {
?>
<p class="noti_success">Success! We will contact you.</p>
  <?php
} else {
?>
<p class="noti_fail">Failed! Try again</p>
  <?php
}
?>
