<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_microposts = $user->microposts()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        //お気に入りの数
        $count_favoritings = $user->favoritings()->count();
        
        return [
            'count_microposts' => $count_microposts,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            //お気に入りしている数
            'count_favoritings' => $count_favoritings,
        ];
    }
    
    public function fcounts($microposts){
        
        $count_favoriters =  $microposts->favoriters()->count();
        
        return [
            'count_fovoriters' => $count_favoriters,
        ];
    }
}
