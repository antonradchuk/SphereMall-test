<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.11.17
 * Time: 22:02
 */

namespace Library;



class Request
{
    private $get;
    private $post;
    private $server;

    public function __construct ()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function post( $key, $default = null)
    {
        return isset($this->post[$key]) ? $this->post[$key] : $default;
    }

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        return isset($this->get[$key]) ? $this->get[$key] : $default;
    }

    /**
     * @return bool
     */
    public function isPost() : bool
    {
        return (bool)$this->post;
    }

}