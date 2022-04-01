<strong>{{ $message }}</strong>

<strong>{{ trans('backup::notifications.exception_message_title') }}:</strong>
{{ $exception->getMessage() }}

@if(isset($description))
    <i>{{ $description }}</i>
@endif

@include('notification.telegram.backup.properties', ['properties' => $properties])