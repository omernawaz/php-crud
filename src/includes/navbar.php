<?php $current_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
$inactive = 'nav-link';
$active = 'nav-link active';

// echo $current_page == 'index.php' ? $active : $inactive;
// echo $current_page == 'feedback.php' ? $active : $inactive;
// echo $current_page == 'about.php' ? $active : $inactive;
?>


<nav class="navbar sticky-top bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://www.arbisoft.com">
      <img src="images/arbilogo.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
      Arbisoft
    </a>

    <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
            <a class="<?php echo $current_page == 'index.php' ? $active : $inactive ?>" href="index.php">Feedback Form</a>
        </li>
        <li class="nav-item">
            <a class="<?php echo $current_page == 'feedback.php' ? $active : $inactive ?>" href="feedback.php">Past Feedback</a>
        </li>
        <li class="nav-item">
            <a class="<?php echo $current_page == 'about.php' ? $active : $inactive ?>" href="about.php">About</a>
        </li>
    </ul>
  </div>

</nav>