<?php


namespace App\Helpers;

class Socket
{

    public static $user_channel = "user.";
    public static $user_notification_event = "notification.created";

    /**
     * @param integer $user_id
     * @return array
     */
    public static function credentials(int $user_id) : array
    {
        return [
            "key" => env("PUSHER_APP_KEY"),
            "wsHost" => env("PUSHER_APP_HOST"),
            "wsPort" => (int) env("PUSHER_APP_PORT", 6001),
            "wssPort" => (int) env("PUSHER_APP_PORT", 6001),
            "channel" => self::$user_channel.$user_id,
            "event" => "." . self::$user_notification_event,
        ];
    }
}
