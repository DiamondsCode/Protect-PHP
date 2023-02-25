<?php
// Start session
session_start();

// Set username and password
$username = 'user'; // CHANGE
$password = 'password'; // CHANGE

// Check if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  // User is logged in, show content
  include('content.php'); // CHANGE
} else {
  // User is not logged in, show login form
  include('passwd-hd.php');
  include('passwd-ln.php');
  include('passwd-ft.php');
}

// Check if form was submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Check if username and password are correct
  if ($_POST['username'] == $username && $_POST['password'] == $password) {
    // Set session variable
    $_SESSION['loggedin'] = true;

    // Redirect to the same page to avoid resubmitting the form
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
  } else {
    // Display error message
    $error = 'Invalid username or password';
  }
}
?>
