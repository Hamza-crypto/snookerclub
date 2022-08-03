@component('mail::message')

You just got a new contact request from {{ $data['name'] }} <br>
Email: {{ $data['email'] }}<br>
Message: {{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
