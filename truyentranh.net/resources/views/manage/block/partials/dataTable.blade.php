<table class="table table-striped table-bordered table-hover custom-table"
       id="DataTable_{{ $id }}"
       role="grid"
       data-provide="datatables"
       @if(isset($routeAjax)) data-ajax="{{ $routeAjax }}" @endif
       @if(isset($columns)) data-columns='{!! json_encode($columns) !!}' @endif
       data-pagelength="10"
       cellspacing="0">
    <thead>
    <tr role="row" >
        @foreach($fields as $key => $field)
            <th class="sorting" tabindex="0" rowspan="1"
                colspan="1">{!! __($field['label']) !!}
            </th>
        @endforeach
    </tr>
    </thead>
    <tfoot>
    @foreach($fields as $key => $field)
        <th rowspan="1"
            colspan="1">{!! __($field['label']) !!}
        </th>
    @endforeach
    </tfoot>
    <tbody>
    </tbody>
</table>