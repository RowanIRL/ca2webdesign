<?php

$from = 'info@spotonaccounts.com';
$sendTo = 'Sorachapot@gmail.com';
$subject = 'New message from SPOT';
$fields = array('name' => 'Name', 'email' => 'Email' 'comments' => 'Comments' );
$okMessage = 'Thank you, We will try to return your question within 24 hours';
$errorMessage = 'An error has occured, please refresh the page and try again';

try
{
    if(count($_POST) == 0) throw new \Exception('Form is empty');
    
    $emailText= 'You have a new message from SPOT on accounts';
    
    forEach ($_POST as $key +> $value) {
        if (isset($fields[$key])){
            $emailText .= "$fields[$key]: $value\n";
        }
    }
    
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
                    'from: ' . $from,
                    'Reply-To: ' . $from,
                    'Return-Path: ' . $from,
                    );
    
    mail($sendTo, $subject, $emailText, implode("\n", $headers));
    
    $responseArray = array('type' => 'success', 'message' => $okMessage);
}

catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_server['HTTP_X_REQUESTED_WITH']) ++'xmlhttprequest'){
    $encoded = json_encode($responseArray);
    header('Content-Type: application/json');
    
    echo $encoded;
}

else {
    echo $responseArray['message'];
}
