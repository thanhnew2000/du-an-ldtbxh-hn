@foreach($notifications as $notifyId => $cursor)
    <div data-notify-id="{{$notifyId}}" onclick="window.location.href = '{{$cursor['url']}}'" class="m-list-timeline__item notify__item @if($cursor['status'] == config('common.firestore_notification_status.unread')) unread @endif">
        <span
                class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
        <span class="m-list-timeline__text">
        <strong>{{$cursor['sending_user_fullname']}}</strong>
        <br>
        <strong>{{$cursor['message_title']}}</strong>
        <br>
            {{\Str::of($cursor['message_content'])->limit(70)}}
        </span>
        <span class="m-list-timeline__time">{{$cursor['time_ago']}}</span>
    </div>
@endforeach