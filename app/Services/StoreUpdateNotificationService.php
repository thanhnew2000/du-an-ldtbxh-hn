<?php

namespace App\Services;


use App\Repositories\TuVanHoTroRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Auth;
class StoreUpdateNotificationService extends AppService
{
    protected $tuVanHoTro;
    protected $notificationService;
    public function __construct(NotificationService $notificationService
    )
    {
        $this->notificationService = $notificationService;
    }

    public function StoreUpdateBM($content){
       $url = route('chitietsolieutuyensinh',['co_so_id'=>$content['co_so_id']]);
       $url= $url.'?nam='.$content['nam'] .'&dot='. $content['dot'];
            $adminUsers = [1, 2, 3, 28];
            $notifiData = [];
            foreach ($adminUsers as $user){
                $notifiData[] = [
                    'data_id' =>1,
                    'message_title' => $content['tieu_de'],
                    'message_content' => $content['conntent'],
                    'read_time' => null,
                    'recceive_user_id' => $user,
                    'sending_time' => Carbon::now(),
                    'sending_user_id' => -1,
                    'url' => $url,
                    'sending_user_fullname'=>$content['sending_user_fullname'],
                    // 'module_name' => $content['module_name'],
                    'status' => 1,
                    'nam' => $content['nam'],
                    'dot' => $content['dot'],
                    'co_so_id' => $content['co_so_id']
                ];                  
        }
            $this->notificationService->pushNotification($notifiData);
    }


}