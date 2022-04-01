<strong> {{ $user->username }} successfully logged in at {{ request()->server()['HTTP_REFERER'] ?? request()->server()['SERVER_NAME'] }}
</strong>

- Ip Adrress: {{ request()->ip() }}
- User Agent: {{ request()->server()['HTTP_USER_AGENT'] }}
- Datetime: {{ now() }}
