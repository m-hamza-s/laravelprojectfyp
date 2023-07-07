<?php

namespace App\Helper;
class UtilsHelper {
    public static function status($status){
        if($status ==5){
            return "<span class='badge badge-danger' style='padding: .5rem .75rem;'>Cancelled</span>";
        }else if ($status == 2){
            return "<span class='badge badge-primary' style='padding: .5rem .75rem;'>Approved</span>";
        }
        else if ($status == 3){
            return "<span class='badge badge-info' style='padding: .5rem .75rem;'>Dispatched</span>";
        }
        else if ($status == 4){
            return "<span class='badge badge-success' style='padding: .5rem .75rem;'>Delivered</span>";
        }
        
        else{
           
            return "<span class='badge badge-warning' style='padding: .5rem .75rem;'>Pending</span>";
        }
    }
}
?>