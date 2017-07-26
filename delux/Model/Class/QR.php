<?php
    class QR{
        private $text;
        private $name;

        public function __construct($text, $name)
        {
            $this->text = $text;
            $this->name = $name;
        }
        public function creaQR($text, $name)
        {
            require "../../Lib/phpqrcode/qrlib.php"; 
            header("Content-Type: image/png");

            $codeContents  = 'Email: '.$name."\n";
            $codeContents .= 'Passwd: '.$text."\n";

            QRcode::png($codeContents, $name.".png", QR_ECLEVEL_L, 7);
        }
    }
?>