<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'PHPMailer-master', array('file' => 'phpmailer/PHPMailerAutoload.php'));
class EmailComponent extends Component {
    public $url = "rnrsoft.in/wellCareSoon/#/verify/";

    public function sendMail($user, $temp_password, $company_details){
        if( empty($user) )
            return false;
            $subject = "Welcome to ". $company_details["value"]."!";
            try {
                $mail = new PHPMailer;

                // $mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Debugoutput = 'html';
                $mail->Host = 'rnrsoft.in';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; 
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->Username = 'wellcaresoon@rnrsoft.in';                 // SMTP username
                $mail->Password = 'NCDub!H-NJ)g';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                  // TCP port to connect to

                $mail->setFrom('wellcaresoon@rnrsoft.in', $company_details["value"]);

                //$mail->addAddress('aanturkar@tiuconsulting.com', 'LRS');     // Add a recipient
                $mail->addAddress($user['email']);     // Add a recipient
                $mail->isHTML(true); 
                $mail->Subject = $subject;
                // welcomeMailTemplate.ctp
                $templt_msg = $this->WelcomeMailTemplate($user, $temp_password, $company_details);
                $mail->Body = $templt_msg;
                
                if ($mail->send()) {
                    return true;
                }else{
                    return false;
                }
            } catch ( Exception $e ) {
                return false;
            }
        return true;
    }

    public function sendCommonMail($user, $company_details, $subject, $message){
        try {
                $mail = new PHPMailer;

                // $mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Debugoutput = 'html';
                $mail->Host = 'rnrsoft.in';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; 
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->Username = 'wellcaresoon@rnrsoft.in';                 // SMTP username
                $mail->Password = 'NCDub!H-NJ)g';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                  // TCP port to connect to

                $mail->setFrom('wellcaresoon@rnrsoft.in', $company_details["value"]);

                //$mail->addAddress('aanturkar@tiuconsulting.com', 'LRS');     // Add a recipient
                $mail->addAddress($user['email']);     // Add a recipient
                $mail->isHTML(true); 
                $mail->Subject = $subject;
                // welcomeMailTemplate.ctp
                $templt_msg = $this->mailTemplate($user, $company_details, $message);
                $mail->Body = $templt_msg;
                
                if ($mail->send()) {
                    return true;
                }else{
                    return false;
                }
            } catch ( Exception $e ) {
                return false;
            }
    }
    public function sendForgotPasswordMail($user,$tokenKey,$company_details, $requestfrom){
        $webRoot = Router::url('/', true);
        $subject = 'Reset your password';
        $message = '<tr>
                        <td class="content-block">
                            Please click on following link to change your password.
                        </td>
                    <tr>
                    <tr>
                        <td class="content-block aligncenter">
                            <a href="'.$webRoot.$requestfrom.'/reset_password/'.$user["User"]["id"].'/'.$tokenKey.'" class="btn-primary">Reset password</a>
                        </td>
                    </tr>';
        $this->sendCommonMail($user['User'], $company_details, $subject, $message);
    }
    public function WelcomeMailTemplate($user, $temp_password,$company_details){
        $webRoot = Router::url('/', true);
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Actionable emails e.g. reset password</title>
                    <style type="text/css">
                            * {
                                margin: 0;
                                padding: 0;
                                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                            }

                            img {
                                max-width: 100%;
                            }

                            body {
                                -webkit-font-smoothing: antialiased;
                                -webkit-text-size-adjust: none;
                                width: 100% !important;
                                height: 100%;
                                line-height: 1.6;
                            }

                            table td {
                                vertical-align: top;
                            }

                            body {
                                background-color: #f6f6f6;
                            }

                            .body-wrap {
                                background-color: #f6f6f6;
                                width: 100%;
                            }

                            .container {
                                display: block !important;
                                max-width: 600px !important;
                                margin: 0 auto !important;
                                /* makes it centered */
                                clear: both !important;
                            }

                            .content {
                                max-width: 600px;
                                margin: 0 auto;
                                display: block;
                                padding: 20px;
                            }
                            .main {
                                background: #fff;
                                border: 1px solid #e9e9e9;
                                border-radius: 3px;
                            }

                            .content-wrap {
                                padding: 20px;
                            }

                            .content-block {
                                padding: 0 0 20px;
                                line-height:25px;
                            }

                            .header {
                                width: 100%;
                                margin-bottom: 20px;
                            }

                            .footer {
                                width: 100%;
                                clear: both;
                                color: #999;
                                padding: 20px;
                            }
                            .footer a {
                                color: #999;
                            }
                            .footer p, .footer a, .footer unsubscribe, .footer td {
                                font-size: 12px;
                            }

                            h1, h2, h3 {
                                font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                                color: #000;
                                margin: 0px;
                                line-height: 1.2;
                                font-weight: 400;
                            }

                            h1 {
                                font-size: 32px;
                                font-weight: 500;
                            }

                            h2 {
                                font-size: 24px;
                            }

                            h3 {
                                font-size: 18px;
                            }

                            h4 {
                                font-size: 14px;
                                font-weight: 600;
                            }

                            p, ul, ol {
                                margin-bottom: 10px;
                                font-weight: normal;
                            }
                            p li, ul li, ol li {
                                margin-left: 5px;
                                list-style-position: inside;
                            }
                            a {
                                color: #1ab394;
                                text-decoration: underline;
                            }

                            .btn-primary {
                                text-decoration: none;
                                color: #FFF;
                                background-color: #1ab394;
                                border: solid #1ab394;
                                border-width: 5px 10px;
                                line-height: 2;
                                font-weight: bold;
                                text-align: center;
                                cursor: pointer;
                                display: inline-block;
                                border-radius: 5px;
                                text-transform: capitalize;
                            }
                                .last {
                                    margin-bottom: 0;
                                }

                                .first {
                                    margin-top: 0;
                                }

                                .aligncenter {
                                    text-align: center;
                                }

                                .alignright {
                                    text-align: right;
                                }

                                .alignleft {
                                    text-align: left;
                                }

                                .clear {
                                    clear: both;
                                }
                                .first-div{
                                    height: 120px;
                                    background-color: #01a79d !important;
                                }
                     
                            @media only screen and (max-width: 640px) {
                                h1, h2, h3, h4 {
                                    font-weight: 600 !important;
                                    margin: 0px 0 5px !important;
                                }

                                h1 {
                                    font-size: 22px !important;
                                }

                                h2 {
                                    font-size: 18px !important;
                                }

                                h3 {
                                    font-size: 16px !important;
                                }

                                .container {
                                    width: 100% !important;
                                }

                                .content, .content-wrap {
                                    padding: 10px !important;
                                }

                                .invoice {
                                    width: 100% !important;
                                }
                            }

                    </style>
                </head>

                <body>

                <table class="body-wrap">
                    <tr>
                        <td></td>
                        <td class="container" width="600">
                            <div class="content">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="content-wrap">
                                            <table  cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="aligncenter"><img class="img-responsive" width="130px;" style=" margin-bottom: 3em;" src="http://rnrsoft.in/testing/'.$company_details["other"].'"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block" style="font-weight: 600; font-size: 16px;">
                                                        Hello '.ucwords($user["f_name"]).' '.ucwords($user["l_name"]) .', 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        Thank you for registering with us. We look forward to have healthy and everlasting relationships with you.   
                                                        Please activate your account by clicking on "Verify your account" button below.
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="content-block aligncenter">
                                                        <a href="'.$this->url.$temp_password.'-'.$user["id"].'" class="btn-primary">Verify your account</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        Kind regards, <br>
                                                       '. $company_details["value"].'
                                                    </td>
                                                </tr>

                                              </table>
                                        </td>
                                    </tr>
                                </table>
                                <div class="footer">
                                    <table width="100%">
                                        <tr>
                                            <td class="aligncenter content-block">© 2018 '. $company_details["value"].' All rights reserved.</td>
                                        </tr>
                                    </table>
                                </div></div>
                        </td>
                        <td></td>
                    </tr>
                </table>

                </body>
                </html>
                ';
    }
    public function mailTemplate($user,$company_details, $message){
        $webRoot = Router::url('/', true);
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Actionable emails e.g. reset password</title>
                    <style type="text/css">
                            * {
                                margin: 0;
                                padding: 0;
                                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                            }

                            img {
                                max-width: 100%;
                            }

                            body {
                                -webkit-font-smoothing: antialiased;
                                -webkit-text-size-adjust: none;
                                width: 100% !important;
                                height: 100%;
                                line-height: 1.6;
                            }

                            table td {
                                vertical-align: top;
                            }

                            body {
                                background-color: #f6f6f6;
                            }

                            .body-wrap {
                                background-color: #f6f6f6;
                                width: 100%;
                            }

                            .container {
                                display: block !important;
                                max-width: 600px !important;
                                margin: 0 auto !important;
                                /* makes it centered */
                                clear: both !important;
                            }

                            .content {
                                max-width: 600px;
                                margin: 0 auto;
                                display: block;
                                padding: 20px;
                            }
                            .main {
                                background: #fff;
                                border: 1px solid #e9e9e9;
                                border-radius: 3px;
                            }

                            .content-wrap {
                                padding: 20px;
                            }

                            .content-block {
                                padding: 0 0 20px;
                                line-height:25px;
                            }

                            .header {
                                width: 100%;
                                margin-bottom: 20px;
                            }

                            .footer {
                                width: 100%;
                                clear: both;
                                color: #999;
                                padding: 20px;
                            }
                            .footer a {
                                color: #999;
                            }
                            .footer p, .footer a, .footer unsubscribe, .footer td {
                                font-size: 12px;
                            }

                            h1, h2, h3 {
                                font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                                color: #000;
                                margin: 0px;
                                line-height: 1.2;
                                font-weight: 400;
                            }

                            h1 {
                                font-size: 32px;
                                font-weight: 500;
                            }

                            h2 {
                                font-size: 24px;
                            }

                            h3 {
                                font-size: 18px;
                            }

                            h4 {
                                font-size: 14px;
                                font-weight: 600;
                            }

                            p, ul, ol {
                                margin-bottom: 10px;
                                font-weight: normal;
                            }
                            p li, ul li, ol li {
                                margin-left: 5px;
                                list-style-position: inside;
                            }
                            a {
                                color: #1ab394;
                                text-decoration: underline;
                            }

                            .btn-primary {
                                text-decoration: none;
                                color: #FFF;
                                background-color: #1ab394;
                                border: solid #1ab394;
                                border-width: 5px 10px;
                                line-height: 2;
                                font-weight: bold;
                                text-align: center;
                                cursor: pointer;
                                display: inline-block;
                                border-radius: 5px;
                                text-transform: capitalize;
                            }
                                .last {
                                    margin-bottom: 0;
                                }

                                .first {
                                    margin-top: 0;
                                }

                                .aligncenter {
                                    text-align: center;
                                }

                                .alignright {
                                    text-align: right;
                                }

                                .alignleft {
                                    text-align: left;
                                }

                                .clear {
                                    clear: both;
                                }
                                .first-div{
                                    height: 120px;
                                    background-color: #01a79d !important;
                                }
                     
                            @media only screen and (max-width: 640px) {
                                h1, h2, h3, h4 {
                                    font-weight: 600 !important;
                                    margin: 0px 0 5px !important;
                                }

                                h1 {
                                    font-size: 22px !important;
                                }

                                h2 {
                                    font-size: 18px !important;
                                }

                                h3 {
                                    font-size: 16px !important;
                                }

                                .container {
                                    width: 100% !important;
                                }

                                .content, .content-wrap {
                                    padding: 10px !important;
                                }

                                .invoice {
                                    width: 100% !important;
                                }
                            }

                    </style>
                </head>

                <body>

                <table class="body-wrap">
                    <tr>
                        <td></td>
                        <td class="container" width="600">
                            <div class="content">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="content-wrap">
                                            <table  cellpadding="0" cellspacing="0" style="width:100%;">
                                                <tr>
                                                    <td class="aligncenter"><img class="img-responsive" width="130px;" style=" margin-bottom: 3em;" src="http://rnrsoft.in/testing/'.$company_details["other"].'"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block" style="font-weight: 600; font-size: 16px;">
                                                        Hello '.ucwords($user["f_name"]).' '.ucwords($user["l_name"]) .', 
                                                    </td>
                                                </tr>
                                                '.$message.'
                                                <tr>
                                                    <td class="content-block">
                                                        Kind regards, <br>
                                                       '. $company_details["value"].'
                                                    </td>
                                                </tr>

                                              </table>
                                        </td>
                                    </tr>
                                </table>
                                <div class="footer">
                                    <table width="100%">
                                        <tr>
                                            <td class="aligncenter content-block">© 2018 '. $company_details["value"].' All rights reserved.</td>
                                        </tr>
                                    </table>
                                </div></div>
                        </td>
                        <td></td>
                    </tr>
                </table>

                </body>
                </html>
                ';
    }
};