<?php
use App\Model\Setting;

/*
* Get site setting by key
* @param string $key
*/
function get_setting( $key = null )
{

    if(is_null($key))
    {
        return 'Invalid key!';
    }

    try{
        $setting = Setting::where('key', $key)->first();
        if(!is_null($setting))
        {
            return $setting->value;
        }else{
            return 'Key not found!';
        }

    }catch (\Exception $ex){
        \Artisan::call('cache:clear');
        return $ex->getMessage();
    }

}

function comment_notification(){
    $notification_comments = \App\Model\Comment::where('read_status', 'unread')->get();
    return $notification_comments;
}





