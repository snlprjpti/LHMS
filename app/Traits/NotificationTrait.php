<?php
/**
 * User: prakash
 * Date: 6/20/16
 * Time: 10:34 AM
 */

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait NotificationTrait
{

    public static function createNotification($notification_user_id)
    {
        DB::table('notifications')->insert(
            [
                'notification_user_id' => $notification_user_id,
            ]
        );
    }
}
