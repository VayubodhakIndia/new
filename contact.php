
<?php
/* Set e-mail recipient */
$myemail  = "sales@vayubodhak.com";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['Name'], "Enter your name");
$email  = check_input($_POST['Email'], "Write a Email");
$company    = check_input($_POST['Company']);
$phone  = check_input($_POST['Phone']);
$message1 = check_input($_POST['Message'], "Write your message");
$subject = "Enquiry from Vayubodhak.com"

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}


/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $yourname
E-mail: $email
Company: $company
Phone: $phone
Message:
$message1

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>