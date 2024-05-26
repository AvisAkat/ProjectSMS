@component('mail::message')
Hello {{ $user->name }}

<p>We understand it happens</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)]) {{-- this is the token to be passed in the AuthController/reset --}}
Reset Your Password
@endcomponent
  
<p>In case you have any issue recovering your password, please contact us. </p>

Thanks, <br>
{{ config('app.name') }}
@endcomponent

