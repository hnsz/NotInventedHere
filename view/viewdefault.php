<?php
class ViewDefault
{
    public $title = "Welcome To GoVoorbeeld";
    
    public function pageLoad()
    {
        $title = $this->title;
        
        $head = include TMPLT.'/defaulthead.php';
        $body = include TMPLT.'/defaultbody.php';
        $afterscript = include TMPLT.'/afterscript.php';
        
        $htmldoc = include TMPLT.'/htmldoc.php';
        
        echo $htmldoc;
    }
}
