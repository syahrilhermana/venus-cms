<?php
if(!function_exists('sendEmail')){
    function sendEmail($message_config=[], $redirect = FALSE)
    {
        $CI = get_instance();
        $config['protocol']  = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "your@email.com";
        $config['smtp_pass'] = "your email password";
        $config['charset']   = "utf-8";
        $config['mailtype']  = "html";
        $config['newline']   = "\r\n";
        $config['starttls']  = TRUE;


        $CI->email->initialize($config);
        $CI->email->from('your@email.com', 'your company name');
        $CI->email->to($message_config['recipients']);
        $CI->email->subject($message_config['subject']);
        $CI->email->message($message_config['htmlContent']);
        if ($CI->email->send()) {
            successMessage($message_config['success_message']);
            if($redirect){
                redirect($redirect);
            }
        } else {
            show_error($CI->email->print_debugger());
        }
    }
}
if(!function_exists('successMessage')){
    function successMessage($message)
    {
        return $message; //return flashdata message
    }
}