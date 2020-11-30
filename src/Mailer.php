<?php

/**
 * Class Mailer
 */
class Mailer
{

    /**
     * @param $email
     *
     * @param $message
     *
     * @return bool
     */
    public function sendMessage($email, $message)
    {
        sleep(3);

        echo "send '$message' to '$email'";

        return true;
    }
}
