<?php 
// Check If The User Coming From A Request 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Assign Variables
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING) ;
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $messege = filter_var($_POST['messege'], FILTER_SANITIZE_STRING);

    // Creating Array Of Errors 
    $formErrors = array();
    // User 
    if($user == ""){ 
        $formErrors[] = 'Username Must Be <strong>Not Empty</strong>';
    }elseif(strlen($user) < 3){ // strlen = string lenght
        $formErrors[] = 'Username Must Be Larger Than <strong>2 Characters</strong> ';
    }
    //Email
    if($email == ""){
        $formErrors[] = 'Email Must Be <strong>Not Empty</strong>';
    }
    //Phone
    if ($phone == "") {
        $formErrors[] = 'Phone Must Be <strong>Not Empty</strong>';
    }elseif(strlen($phone) < 10){
        $formErrors[] = 'Phone Number Must Be <strong> 10 Numbers or Larger</strong>';
    }
    // Messege
    if ($messege == "") {  
        $formErrors[] = 'Messege Must Be <strong>Not Empty</strong>';
    }elseif(strlen($messege) <= 15){
        $formErrors[] = 'Messege Must Be <strong>15 Characters or Larger</strong> ';
    }

    // If No Errors Send The Email [mail(To, Subject, Messege , Headers, Parameters)]

    if(empty($formErrors)){
        $headers = 'From : ' .$email  . '\r\n'; // \r\n ==> new line in the email
        $myEmail = 'dhvfhggi1@gmai.com';
        $subject = 'Contact Form';
        mail($myEmail,$subject, $messege, $headers); // الايميل علشان يبعت لازم احطه على دومين غير مجاني 

        $user = '' ;
        $email = '';
        $phone = '';
        $messege = '';

        $success = '<div class="alert alert-success">We Have Recieved Your Messege</div>';
    }
}
?>

<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF_8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Us</title>
        <link rel= "stylesheet"  href ="css/bootstrap.css" />
        <link rel= "stylesheet"  href ="css/all.min.css" />
        <link rel= "stylesheet"  href ="css/contact.css" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;0,900;1,900&display=swap" rel="stylesheet">
    </head>
    <body>        
        
        <div class="container">
            <h1 class="text-center" >Contact Us </h1>
            <!-- Start Form -->
            <form class="contact-form" action=<?php echo $_SERVER['PHP_SELF']?> method="POST">
            <!-- start Form Errors -->
            <?php
            
            if(! empty($formErrors)){  // if errors exiset show the div ,if not do not Show it
            echo "<div class='form-errors alert alert-danger' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-lable='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>";
                    foreach($formErrors as $error) { // loop for show the errors on the page
                        echo "*$error <br />";
                    } 
            echo "</div>";
            } 
            ?>
            <!-- End Form Errors -->
            <!-- Success Messege -->
            <?php if(isset($success)){ echo $success ;} ?>
                <!-- User Name Input -->
                <div class="form-group">
                    <input 
                        class="form-control username" 
                        type="text" 
                        name="username" 
                        placeholder="Type Your Name"
                        value= "<?php if(isset($user)) {echo $user ;} ?>" require/> <!-- علشان تبقى المعلومات داخل الفورم ولا يضطر المستخدم لاعادة كتابتها ويعدل عليها فقط -->
                        <i class="fa fa-user fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Username Must Be Larger Than <strong>2 Characters</strong>
                    </div>
                </div>
                <!-- Email Input -->
                <div class="form-group">
                    <input 
                        class="form-control email" 
                        type="email" 
                        name="email" 
                        placeholder="Type Your Email"
                        value= "<?php if(isset($email)) {echo $email ;} ?>"
                        require
                    />
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Email Must Be <strong>Not Empty</strong>
                    </div>
                </div>
                <!-- Phone Input -->
                <div class="form-group">
                    <input 
                        class="form-control phone" 
                        type="text" 
                        name="phone" 
                        placeholder="Type Your Cell Phone"
                        value= "<?php if(isset($phone)) {echo $phone ;} ?>"
                        require
                    />
                    <i class="fa fa-phone fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Phone Number Must Be <strong> 10 Numbers or Larger </strong>
                    </div>
                </div>
                <!-- Messege Input -->
                <div class="form-group">
                    <textarea 
                        class="form-control messege" 
                        name="messege"
                        placeholder ="Type Your Messege" require><?php if(isset($messege)) {echo $messege ;} ?></textarea>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Messege Must Be <strong>15 Characters or Larger</strong>
                    </div>
                </div>
                <!-- Send Input -->
                <div class="form-group send-button">
                    <input 
                        class="btn btn-success" 
                        type="submit" 
                        value="Send Messege" 
                    />
                    <i class="send-icon fa fa-paper-plane fa-fw"></i>
                </div>
            </form>
            <!-- End Form -->
        </div>
        <script src= "js/jQuery v3.5.1.js"></script>
        <script src= "js/bootstrap.bundle.min.js"></script>
        <script src= "js/custom.js"></script>
    </body>
</html>