@component('mail::message')


Verificate Here {{ Auth::user()->name }}

@component('mail::button', ['url' => 'https://www.google.com'])
Click Here
@endcomponent
@endcomponent
