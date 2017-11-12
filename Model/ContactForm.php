<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.11.17
 * Time: 23:26
 */

namespace Model;

use Library\Request;


class ContactForm
{
    public $firstName;
    public $secondName;
    public $email;
    public $message;


    public function __construct (Request $request)
    {
        $this->firstName = $request->post('firstname');
        $this->secondName = $request->post('secondname');
        $this->email = $request->post('email');
        $this->message = $request->post('message');
    }

    private function isEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL );
    }

    public function isValid()
    {
        $res = $this->firstName !== ''
               && $this->secondName !== ''
               && $this->message !== ''
               && $this->email !== '';

        return $res;
    }


}