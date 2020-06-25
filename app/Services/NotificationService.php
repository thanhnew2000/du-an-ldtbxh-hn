<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 6/19/20
 * Time: 09:32
 */

namespace App\Services;


use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use \Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;
class NotificationService
{
    public function pushNotification($notifyContent){
        $firestore = $this->getFirestoreConnect();
        $collection = $firestore->collection(config('common.firestore_notification_collection'));
        foreach ($notifyContent as $cursor){
            $collection->add($cursor);
        }
//        $query = $collection->where('sending_user_id', '=', 3);
//                            ->where('status', '=', 2);

//        $snapshot = $query->documents();
    }

    public function getUserNotifications($userId){
        $firestore = $this->getFirestoreConnect();
        $collection = $firestore->collection(config('common.firestore_notification_collection'));
//        dd($userId);
        $query = $collection->where('recceive_user_id', '=', $userId)
                        ->limit(100);
//                    ->where('status', '=', config('common.firestore_notification_status.unread'));
//                    ->orderBy('sending_time', 'DESC');
        return $query->documents();
    }

    private function getFirestoreConnect(){
        $serviceAccount = ServiceAccount::fromJsonFile(storage_path('app/firebase-config/firebase_credentials.json'));
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount);
        return (new FirestoreClient([
            'projectId' => env('FIREBASE_NOTIFICATION_PROJECT_ID'),
        ]));
    }
}