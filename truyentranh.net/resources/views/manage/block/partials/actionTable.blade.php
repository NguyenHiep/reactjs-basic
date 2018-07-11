@if(count($actions) == 1)
    @php $action = reset($actions); @endphp
    <div class="btn-group btn-sm">
        <a class="btn btn-danger"
        @foreach ($action['attribute'] as $attr => $val)
            {{ $attr }} = "{{ $val }}"
        @endforeach
        >
        {{__($action['label'])}}
        </a>
    </div>
@else
    <div class="btn-group btn-sm">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">{{ __('Action') }}
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            @foreach($actions as $item)
                <a class="dropdown-item"
                @foreach ($item['attribute'] as $attr => $val)
                    {{ $attr }} = "{{ $val }}"
                @endforeach
                >
                {!! __($item['label']) !!}
                </a>
            @endforeach
        </div>
    </div>
@endif