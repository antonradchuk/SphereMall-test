<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.11.17
 * Time: 17:15
 */

namespace Model;

use Library\Request;

class Image
{
    const UPLOAD_DIR =  'uploads/';
    const EXTENSIONS = ['jpg', 'jpeg', 'gif', 'png'];

    public $name;
    public $size;
    public $error;
    public $tmp_name;
    public $imError;



    public function __construct (Request $request)
    {
        $this->name = basename($request->file['image']['name']);
        $this->size = $request->file['image']['size'];
        $this->error = $request->file['image']['error'];
        $this->tmp_name = $request->file['image']['tmp_name'];

        $this->imageSize() ? null : $this->imError[] = 'Incorrect file size';
        $this->extensionCheck() ? null : $this->imError[] = 'Incorrect file extension';
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
        if($this->size > 300000){
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