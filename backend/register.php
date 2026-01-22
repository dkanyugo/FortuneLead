<?php
include "./autoloader.php";
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = Database::get_database();
  if ($_POST['surname'] !== NULL && $_POST['firstname'] !== NULL && $_POST['email'] !== NULL && $_POST['phone'] !== NULL){
    $success = $db->add_lead($_POST['surname'], $_POST['firstname'], $_POST['email'], $_POST['phone']);
  }
}
if ($success) {
?>
<div class="NotiSuccess" id="Notification">
  <p>Registration successful! We will get back to you soon</p>
</div>
<?php
} else {
?>
<div class="NotiFailure" id="Notification">
  <p>Registration Failed! Try again. If the problem persists contact us.</p>
</div>
  <?php
}
?>
