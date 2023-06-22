<x-mail::message>
# Introduction

Please click the button below to verify your email address.

<x-mail::button :url="'http://localhost:8000/'">
Button Text
</x-mail::button>

If you did not create an account, no further action is required.

Regards,
DragonComponent<br>
{{ config('app.name') }}
</x-mail::message>
