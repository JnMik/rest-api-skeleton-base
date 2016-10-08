<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jm
 * Date: 15-10-06
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */

namespace Api\Base\Service;

use PHPMailer;
use phpmailerException;

class MailingService {

    public function sendEmail(array $receiver, $from, $fromName, $subject, $description) {

        try {

            $mail = new PHPMailer(true);
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->From     = $from;
            $mail->FromName = $fromName;
            $mail->Subject  = $subject;
            $mail->Body     = $description;
            $mail->WordWrap = 50;

            $mail->Host = 'relais.videotron.ca';
            $mail->Port = 25;

            foreach($receiver as $email) {
                $mail->AddAddress($email);
            }

            if(!$mail->Send()) {
                throw new \Exception('Message could not be sent');
            }

            return true;

        } catch (phpmailerException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }

    }

}