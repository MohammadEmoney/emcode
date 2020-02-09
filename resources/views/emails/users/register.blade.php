@component('mail::message')
# Welcome To Emcode

### Dear {{ $user->name }},
Thank you for registering to [emcode.ir](https://emcode.ir "A programming guuid for better coding"). Your registration has been received.

You registered with this email: {{ $user->email }}.

If you forgot your password, simply hit "Forgot password" and you'll be prompted to reset it.

Kind Regards,<br>
{{ config('app.name') }}
Instagram : [emcode.ir](https://instagram.com/emcode.ir)
Facebook : [emcode.ir](https://facebook.com/emcode.ir)
contact number: **+98 935 420 9109**
@endcomponent
