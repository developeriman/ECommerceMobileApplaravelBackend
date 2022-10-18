<?php

use App\Enums\Constant;
use App\Models\User;



if (!function_exists("isActive")) {
    function isActive($url)
    {
        $browserUrl = request()->getRequestUri();
        if (strpos($browserUrl, $url)) {
            return 'active';
        }
    }
}

if(!function_exists("defaultLimit")){
    function defaultLimit(){
        return 10;
    }
}

if (!function_exists("limits")) {
    function limits()
    {
        return [10,20,30,40,50,60,70,80];
    }
}

if (!function_exists("sorts")) {
    function sorts()
    {
        return [["value" => "DESC", "text" => "DESCENDING"],["value"=>"ASC","text"=>"ASCENDING"]];
    }
}

if (!function_exists("getProductStatus")) {
    function getProductStatus()
    {
        return ['INACTIVE','ACTIVE'];
    }
}

if (!function_exists("getAmountType")) {
    function getAmountType($type)
    {
        $AmountType =  ['','DEBIT','CREDIT','REFUND'];
        return $AmountType[$type];

    }
}

if (!function_exists("getRouteName")) {
    function getRouteName($userType=null)
    {
        $userType = $userType?$userType:User::getUserType();
        if($userType == 1){
            return 'admin';
        }
        else if($userType == 2){
            return 'agent';
        }
        else if($userType == 3){
            return 'user';
        }
        else if($userType == 4){
            return 'seller';
        }
    }
}

if (!function_exists("getFormInfo")) {
    function getFormInfo($isEditInfo,$others=[])
    {
        if($isEditInfo){
            $info = ['title' => 'EDIT', 'status' => 'success', 'button_name' => 'UPDATE', 'image_class' => 'edit-input'];
        }else{
            $info = ['title' => 'CREATE', 'status' => 'success', 'button_name' => 'CREATE', 'image_class' => ''];
        }
        return array_merge($info,$others);
    }
}

if (!function_exists("getUserRole")) {
    function getUserRole($userType)
    {
        if ($userType == 1) {
            return 'Admin';
        } else if ($userType == 2) {
            return 'Agent';
        } else if ($userType == 3) {
            return 'User';
        }
        else if ($userType == 4) {
            return 'Seller';
        }
    }
}

if (!function_exists("getFolderName")) {
    function getFolderName($userType)
    {
        if ($userType == 1) {
            return 'admin';
        } else if ($userType == 2) {
            return 'agent';
        } else if ($userType == 3) {
            return 'user';
        } else if ($userType == 4) {
            return 'seller';
        }
    }
}




?>
