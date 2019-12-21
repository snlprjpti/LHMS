<?php
namespace App\Http\ViewComposers;

use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationComposer
{
    /**
     * @var Notification
     */
    private $notification;

    function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function compose(View $view)
    {
        $notifications = $this->notification->where('notification_user_id', Auth::guard('employee')->id)->orderBy('id', 'DESC')->limit(10)->get();
        $view->with('notifications', $notifications);
    }


}
