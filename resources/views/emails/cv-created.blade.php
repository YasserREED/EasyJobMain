@component('mail::message')
# CV Service Created

Dear {{ $cv->user->name }},

Your CV service has been successfully created!

@component('mail::panel')
**Service Details:**
- Subject: {{ $cv->subject }}
- Plan: {{ $cv->plan === 1 ? 'Premium' : ($cv->plan === 2 ? 'Premium Plus' : 'Premium Pro') }}
- Region: {{ $cv->regionText() }}
- Domain: {{ $cv->domain }}
- Created: {{ $cv->created_at->format('Y-m-d H:i:s') }}
@endcomponent

@component('mail::button', ['url' => config('app.url') . '/CVs'])
View Your CVs
@endcomponent

Your CV is now in our system and will be processed soon.

Best regards,
{{ config('app.name') }}
@endcomponent