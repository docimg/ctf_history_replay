<?php
class pop
{
    public $aaa;

    public static $bbb = false;

    public function __wakeup()
    {
        //Do you know CVE?
        throw new Exception("The class pop should never be serialized.");    
    }

    public function __destruct()
    {
        for ($i=0; $i<2; $i++) {
            if (self::$bbb) {
                $this->aaa[1]($this->aaa[2]);
            } else {
                self::$bbb = call_user_func($this->aaa["object"]);
            }
        }
    }
}

class chain
{
    private $AFKL;

    protected function getAFKL()
    {
        return $this->AFKL;
    }
}

class epic extends chain
{
    public $aaa;

    public static $bbb = false;

    public function __invoke()
    {
        return self::$bbb;
    }

    public function __call($name, $params)
    {
        return $this->aaa->$name($params);
    }
}

if (isset($_GET["code"])) {
    unserialize(base64_decode($_GET["code"]));
} else {
    highlight_file(__FILE__);
}