<?php
class Sanitiser{
     public static function sanitise($data){
        return htmlspecialchars(trim($data))
    }
}
?>