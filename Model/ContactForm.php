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
    public $error = [];


    public function __construct (Request $request)
    {
        $this->firstName = $request->post('firstname');
        $this->secondName = $request->post('secondname');
        $this->email = $request->post('email');
        $this->message = $request->post('message');

        $this->emptyElement($this->firstName) ? null : $this->error[] = 'Fill the field First Name';
        $this->emptyElement($this->secondName) ? null : $this->error[] = 'Fill the field Second Name';
        $this->emptyElement($this->email) ? null : $this->error[] = 'Fill the field email';
        $this->emptyElement($this->message) ? null : $this->error[] = 'Fill the field message';
    }

    public function emptyElement($element){
        if($element === ''){
            return false;
        }
        return true;
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