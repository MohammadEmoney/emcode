@component('mail::message')
# Congratulations

### A user registerd with

**email**: *{{ $user->email }}*
**name**: *{{ $user->name }}*
**at**: *{{ $user->created_at }}*

Joined to site.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
