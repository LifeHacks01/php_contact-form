<?php

   $msg ='';
   $msgClass ='';

   if(filter_has_var(INPUT_POST,'submit')){
       $name=htmlspecialchars($_POST['name']);
       $email=htmlspecialchars($_POST['email']);
       $message=htmlspecialchars($_POST['message']);

       if(!empty($email) && !empty($name) && !empty($message)){
           //
           //echo 'PASSED';

        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            $msg='Please fill the corect email';
            $msgClass='alert-danger';

        } else{
             //echo 'PASSED';
             $toEmail ='srijansingh1325@gmail.com';
             $subject ='Contact Request From'.$name;
             $body = '<h2>Contact Request</h2>
             <h4>Name</h4><p>'.$name.'</p>
             <h4>Email</h4><p>'.$email.'</p>
             <h4>Message</h4><p>'.$message.'</p>
             ';

             $headers ="MIME-Version: 1.0"."\r\n";
             $headers="Content-Type:text/html;charset=UTF-8"."\r\n";

             $headers.="From:".$name."<".$email.">"."\r\n";
             if(mail($toEmail,$subject,$body,$headers)){
                 $msg='your email has been sent';
                 $msgClass ='alert-success';

             }else{
                $msg='Your email was not sent';
                $msgClass='alert-danger';
             }
        
        
            }

       }else{
           //
           $msg='Please fill all the field';
           $msgClass='alert-danger';
       }




   }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>My project</title>
  </head>
  <body>
       <nav class="navbar navbar-default">
          <div class ="container">
              <div class="navbar-header">
                <a class="navbar-brand" href="index.php">MY Website</a>
              </div>
          </div>
          </nav>
        <div class="container">
        <?php if($msg !=''):?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif;?>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> "
          >
           <div class="form-group">
               <label>Name</label>
               <input type="text" name="name" class="form-control"
               value="<?php echo isset($_POST['name']) ? $name:'';?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control"
                value="<?php echo isset($_POST['email']) ? $email:'';?>">

                            
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message:'';?>"></textarea>            
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

           
           </form>
        
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

  </body>
</html>