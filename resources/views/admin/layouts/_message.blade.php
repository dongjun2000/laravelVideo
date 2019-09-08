@foreach(['danger', 'warning', 'success', 'info'] as $message)
    @if(session($message))
        <div class="alert alert-{{ $message }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{session($message)}}</strong>
        </div>
    @endif
@endforeach