<?php include 'includes/header.php' ?>
<?php include 'scripts/config.php'; ?>
<?php 
    // $feedbacks = [
    //     [
    //         'email' => "matt@gmail.com",
    //         'name' => 'Matt Hassel',
    //         'feedback' => "I wanted to tell you how much I appreciate the work you and your team have been doing of all the overseas teams I've worked with, yours is the most communicative, most responsive and most talented."
    //     ],
    //     [
    //         'email' => "ethan@gmail.com",
    //         'name' => 'Ethan Laub',
    //         'feedback' => "Arbisoft was an invaluable partner in developing TripScanner, as they served as my outsourced website and software development team. Arbisoft did an incredible job, building TripScanner end-to-end, and completing the project on time and within budget at a fraction of the cost of a US-based developer."
    //     ],
    //     [
    //         'email' => "andy@gmail.com",
    //         'name' => 'Andrew Kimball',
    //         'feedback' => "Arbisoft is one of the most professional development partners we have ever worked with. They have proven time and again that they will not only do what we ask them to do, they will work hard to understand our ultimate goals and recommend innovative approaches to achieve those goals. Their developers are thoughtful and responsive. It's like having a development team in the office next door."
    //     ]
    // ]

    $query = "SELECT * FROM userfeedback ORDER BY date desc";
    $stmt = $db_handle->prepare($query);
    $stmt->execute();

    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //$query_result = mysqli_query($conn,$query);
    //$feedbacks = mysqli_fetch_all($query_result,MYSQLI_ASSOC);
?>


<body>
    <?php include 'includes/navbar.php' ?>
    
    <div class = 'container-fluid justify-content-center text-center p-5'>
        <h2 class= 'text-secondary'>What people say about us.</h2>

        <?php if(empty($feedbacks)): ?>
            <h3 class = 'mt-3 text-black-50'> There is no feedback yet!</h3>
        <?php endif; ?>
    </div>  


    <div class = 'container d-flex flex-column align-items-center'>
        <?php foreach($feedbacks as $feedback): ?>
            <div class="card my-3 w-75">
                <div class="card-body text-center "> 
                    <div class = "fw-light fst-italic">
                        "<?php echo $feedback['body']; ?>"
                    </div>
                    <div class = "text-secondary mt-2">
                        By <?php echo $feedback['name']; ?>
                    </div>
                    <small class = 'text-black-50'> On <?php echo $feedback['date']; ?> </small>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include 'includes/footer.php' ?>
</body>