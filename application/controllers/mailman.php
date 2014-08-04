<?php
class MailMan extends Controller {

    public function My_Controller()
    {
        parent::Controller();
        $this->load->library('My_PHPMailer');
    }

    public function send_mail() 
    {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "myusername@gmail.com";  // user email address
        $mail->Password   = "password";            // password in GMail
        $mail->SetFrom('info@yourdomain.com', 'Firstname Lastname');  //Who is sending the email
        $mail->AddReplyTo("response@yourdomain.com","Firstname Lastname");  //email address that receives the response
        $mail->Subject    = "Email subject";
        $mail->Body      = "HTML message";
        $mail->AltBody    = "Plain text message";
        $destino = "addressee@example.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "John Doe");

        $mail->AddAttachment("images/phpmailer.gif");      // some attached files
        $mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
        
        if(!$mail->Send()) 
        {
            $data["message"] = "Error: " . $mail->ErrorInfo;
        } else 
        {
            $data["message"] = "Message sent correctly!";
        }
        $this->load->view('sent_mail',$data);
    }
}