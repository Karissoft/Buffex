@component('mail::message')
# You have got a new message

Email : {{ $email }} <br>
Name : {{ $name }}  <br>
Phone : {{ $phone }}  <br>

Message : {{ $message }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
