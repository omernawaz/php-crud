<?php include 'includes/header.php' ?>
<?php include 'scripts/config.php'; ?>
<?php 

    session_start();

    $nameErr = $emailErr = $bodyErr = '';
    $name = $email = $body = '';
    if(isset($_SESSION['nameErr']))
        $nameErr = $_SESSION['nameErr'];
    else if(isset($_SESSION['name']))
        $name = $_SESSION['name'];
        
    if(isset($_SESSION['emailErr']))
        $emailErr = $_SESSION['emailErr'];
    else if(isset($_SESSION['email']))
        $email = $_SESSION['email'];
    
    if(isset($_SESSION['bodyErr']))
        $bodyErr = $_SESSION['bodyErr'];
    else if(isset($_SESSION['body']))
        $body = $_SESSION['body'];

    foreach($_SESSION as $index => $session_var)
    {
        unset($_SESSION[$index]);
    }

    
?>

<body>
    <?php include 'includes/navbar.php' ?>


    
    <div class = "container-fluid text-center justify-content-center">
        <img src="images/arbi-banner.png" class="w-25 h-auto justify-content-center" alt="arbisoft">

        <h2 class="text-secondary">
            Feedback Form <br>
            <small class="text-black-50">Let us know what you think!</small>
        </h2>
    </div>
    <br><br>
    <div class = 'container-fluid w-25'>
        <form method="POST" action='scripts/submit_form.php'>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control <?php echo !$emailErr ?: 'is-invalid';?>" 
                id="email" name = "email" placeholder='Enter Your Email' value = <?php echo $email?>>
                <div class="invalid-feedback">
                    <?php echo $emailErr; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid';?>" 
                id="name" name = "name" placeholder= "Enter Your Name" value = <?php echo $name ?>>
                <div class="invalid-feedback">
                    <?php echo $nameErr; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Give us your feedback!</label>
                <textarea type="text" class="form-control <?php echo !$bodyErr ?: 'is-invalid';?>" 
                id="body" name ="body" placeholder = "Give us some feedback"  value = <?php echo $body?>></textarea>
                <div class="invalid-feedback">
                    <?php echo $bodyErr; ?>
                </div>
            </div>

            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <?php include 'includes/footer.php' ?>
</body>