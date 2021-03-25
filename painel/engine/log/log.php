<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

class GeraLog{

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance(){
        if (!isset(self::$instance))
        self::$instance = new GeraLog();

        return self::$instance;
    }

    public function inserirLog($msg){
        $msg = "\r\n\r\n".$msg."\r\n\r\n Ocorrido em: ".date("d-m-Y, H:i:s")."\r\n -----------------------------------------------------------------------------------";
        $fp = fopen("log/error_log_".date("d-m-Y").".txt",'a');
        fwrite($fp,$msg);
        fclose($fp);
    }

}
?>
