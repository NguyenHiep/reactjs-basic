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
    <div class="btn-group action-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false">{{ __('Action') }} <span class="caret"></span></button>
        </button>
        <ul class="dropdown-menu pull-right">
            @foreach($actions as $item)
                <li>
                  <a class="dropdown-item" @foreach ($item['attribute'] as $attr => $val){{ $attr }} = "{{ $val }}" @endforeach >
                    {!! __($item['label']) !!}
                  </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif