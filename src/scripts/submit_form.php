

<?php 

include 'config.php';
session_start();

$name = $email = $body = '';

if(isset($_POST['submit']))
{

    
    if(!empty($_POST['name']))
    {
        $name = filter_input(
            INPUT_POST,
            'name',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
          );
        $_SESSION['name'] = $name;
    }
    else
    {
        $_SESSION['nameErr'] = "Name is required";
    }

    if(!empty($_POST['email']))
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_SANITIZE_EMAIL
          );

        $_SESSION['email'] = $email;

    }
    else
    {
        $_SESSION['emailErr'] = "Email is required";
    }

    if(!empty($_POST['body']))
    {
        $body = filter_input(
            INPUT_POST,
            'body',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
          );
        $_SESSION['body'] = $body;

    }
    else
    {
        $_SESSION['bodyErr'] = "Feedback is required";
    }

    if(!empty($name) && !empty($email) && !empty($body))
    {
        $query = "INSERT INTO userfeedback (name, email, body) VALUES (:name, :email, :body)";
        $stmt = $db_handle->prepare($query);
        $stmt->execute(['name'=>$name,'email'=>$email,'body'=>$body]);
        
        header('Location: /feedback.php');

        // if (mysqli_query($conn, $query)) {
        //     header('Location: /phpProject/feedback.php');
        // } else {
        //     echo 'Error: ' . mysqli_error($conn);
        // }
    }
    else
    {
        header('Location: /index.php');
    }
}

?>