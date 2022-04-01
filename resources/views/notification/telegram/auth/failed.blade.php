<strong>Someone trying to login in your app {{ request()->server()['HTTP_REFERER'] ?? request()->server()['SERVER_NAME'] }}</strong>

@foreach ($properties->credentials as $value => $name)
- {{ ucfirst($value) }}: <i>{{ $name }}</i>
@endforeach
- Ip Adrress: {{ request()->ip() }}
- User Agent: {{ request()->server()['HTTP_USER_AGENT'] }}
- Datetime: {{ now() }}