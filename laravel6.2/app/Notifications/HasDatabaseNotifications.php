<php?

namespace Illuminate\Notifications;

trait HasDatabaseNotifications{
        /**
        *Get the entitys notifications
        *
        *
        * @return Illuminate\Database\Eloquent\Relations\MorphMany;
        */
        
        public function notifications()
        {
            return $this->morphMany(DatabaseNotification::class,'notifiable')->orderBy('created_at','desc');
        }

        /**
        *Get the entitys read notifications
        *
        *
        * @return Illuminate\Database\Query\Builder; 
        */

        public function readNotifications()
        {
            return $this->notificationa()->whereNotNull('read_at');
        }
        
        /**
        *Get the entitys unread notifications
        *
        *
        * @return Illuminate\Database\Query\Builder; 
        */

        public function unreadNotifications()
        {
            return $this->notifications()->whereNull('read_at');
        }
}