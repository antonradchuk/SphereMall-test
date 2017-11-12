<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.11.17
 * Time: 17:15
 */

namespace Model;

class Image
{
    const UPLOAD_DIR =  'uploads/';
    const EXTENSIONS = ['jpg', 'jpeg', 'gif', 'png'];

    public $name;
    public $size;
    public $error;
    public $tmp_name;

    public function __construct ()
    {
        $this->name = basename($_FILES['image']['name']);
        $this->size = $_FILES['image']['size'];
        $this->error = $_FILES['image']['error'];
        $this->tmp_name = $_FILES['image']['tmp_name'];
    }

    /**
     * @return bool
     */
    private function extensionCheck(): bool
    {
        $exploded = explode('.', $this->name);
        $extension = end($exploded);

        if(in_array($extension, self::EXTENSIONS)){
            return true;
        }

        return false;
    }


    public function save(): void
    {
        if($this->error === UPLOAD_ERR_OK){
            if(!is_dir(self::UPLOAD_DIR)){
                mkdir(self::UPLOAD_DIR, '0777');
            }
            move_uploaded_file($this->tmp_name, self::UPLOAD_DIR . $this->name );
        }

    }

    /**
     * @return bool
     */
    private function imageSize(): bool
    {
        if($this->size > 100000){
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        if($this->imageSize() === true && $this->extensionCheck() === true){
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getName (): string
    {
        return $this->name;
    }

}