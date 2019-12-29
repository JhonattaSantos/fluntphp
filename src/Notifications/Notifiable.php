<?php

namespace FluntPhp\Notifications;

abstract class Notifiable
{
    protected $notificationsList = [];

    public function notifications()
    {
        return $this->notificationsList;
    }

    public function addNotification($property, $message)
    {
        $this->notificationsList[] = (new Notification($property, $message))->toArray();
    }

    public function addNotifications($notifications)
    {
        $this->notificationsList = $notifications;
    }

    public function invalid()
    {
        return !empty($this->notificationsList);
    }

    public function valid()
    {
        return !$this->invalid();
    }
}
