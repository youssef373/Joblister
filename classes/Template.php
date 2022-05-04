<?php

class Template
{
    //Path to template
    protected $template;
    //Vars Passed In
    protected $vars = array();

    //constructor
    public function __construct($template)
    {
        $this->template = $template;
    }
    public function __get($key)
    {
        return $this->vars[$key];
    }
    public function __set($key,$value)
    {
        $this->vars[$key] = $value;
    }
    public function __toString()
    {
        extract($this->vars);
        chdir(dirname($this->template));
        //start output buffering
        ob_start();

        include basename($this->template);

        //get the template and end buffering
        return ob_get_clean();
    }
}