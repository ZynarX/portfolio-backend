<?php
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["email"]);

        $to = "zynarxs@gmail.com";
        $subject = "Contact Form Submitted by {$name}";
        $body = "{$message}\n\nBy: {$name}\nEmail: {$email}";
        $headers = "From: {$email}";

        if(mail($to, $subject, $body, $headers))
        {
            echo json_encode(["message" => "Email was successfuly sent."]);
        }
        else
        {
            http_response_code(500);
            echo json_encode(["message" => "Email was not successfuly sent."]);
        }
    }
    else
    {
        http_response_code(405);
        echo json_encode(["message" => "Only POST requests are valid."]);
    }
?>
