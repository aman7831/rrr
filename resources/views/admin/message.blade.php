@forelse($messages as $message)
{{$messages->name}}
@empty
no messages
@endforelse
