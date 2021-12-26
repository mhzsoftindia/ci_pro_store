<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" action="<?= base_url('email_controller/send_mail');?>">
        <label for="to_email"> Send mail to :</label>
         <input type="email" name="to_email">
        
         <input type="submit" value="Send">


    </form>


    
</body>
</html>