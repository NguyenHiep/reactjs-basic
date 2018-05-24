<div class="col-xs-12">
  <div class="title-block">
    <h2>Danh sách chương</h2>
  </div>
</div>
<form id="admin-form" method="POST" action="{{ route('books.batch') }}" role="form" class="clearfix">
  {{ csrf_field() }}
  <div class="col-xs-12">
    <div class="paging-wrap clearfix">
      <ul class="list-unstyled btn-2line-wrap">
        <li>
          <div class="btn-group">
            <select id="task" name="batch_actions" class="form-control">
              <option value="">Tác vụ</option>
              <option value="delete">Xóa</option>
              <option value="status_unpublish">Ẩn</option>
              <option value="status_publish">Hiện</option>
            </select>
          </div>
          <button class="btn btn-submit js-action-list-batch" type="submit"><small><i class="fa fa-save"></i></small> Thực thi</button>
        </li>
      </ul>
      
      <div class="block-pagination">
        <p class="number">
          {{--<label>Hiển thị</label>--}}
          <select name="display" id="display" class="form-control w-middle">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
          </select>
          <span>Hiển thị {{ $display_from }} ~ {{ $display_to }} trong <strong>{{ $page_total }}</strong> items</span>
        </p>
        {{ $records->appends(request()->query())->links()  }}
      </div>
    </div>
    <table class="table table-bordered table-hover">
      <thead>
      <tr>
        <th><input id="check_all" type="checkbox"></th>
        <th class="hidden-xs">ID</th>
        <th>Hình ảnh</th>
        <th>Tiêu đề</th>
        <th class="hidden-sm hidden-xs">Nội dung</th>
        <th class="hidden-xs">Thể loại</th>
        <th>Tình trạng</th>
        <th>Ngày tạo</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
      </thead>
      <tbody>
      @if(count($records) > 0)
        @foreach($records as $record)
          <tr>
            <td>
              <input name="ids[]" type="checkbox" value="{{ $record->id }}">
            </td>
            <td class="hidden-xs">{{ $record->id }}</td>
            <td>
              <a href="{{ route('books.edit',$record->id) }}">
                @if(!empty($record->image))
                  <img class="img-thumbnail" src="{!! asset("uploads/thumbnail/thumbnail_".$record->image) !!}" alt="{{ $record->name }}" />
                @endif
              </a>
            </td>
            <td>{{ $record->name }}</td>
            <td class="hidden-sm hidden-xs">{!! Str::words($record->content, 7,'...')  !!}</td>
            <td class="hidden-xs">
              @if(!empty($record->categories))
                <ul class="text-left">
                  @foreach($record->categories as $val)
                    <li>{{ array_get($categories, $val) }}</li>
                  @endforeach
                </ul>
              @endif
            </td>
            <td>
              @if ($record->status == 1)
                {!! '<i class="fa fa-check  text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>' !!}
              @else
                {!! '<i class="fa fa-check text-danger" data-toggle="tooltip" data-placement="top" title="Đã ẩn với người dùng"></i>' !!}
              @endif
            </td>
            <td>{{ $record->created_at }}</td>
            <td>
              <a href="{{ route('books.edit',$record->id) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa"></i></a>
            </td>
            <td><a href="{{ route('books.delete',$record->id) }}" onclick="return confirm('Bạn thật sự muốn xóa?');"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Xóa"></i></a></td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
    <div class="text-right">{{ $records->appends(request()->query())->links()  }}</div>
    <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
    <p class="note-items"><i class="fa fa-check text-success"></i> Hiển thị với người dùng.</p>
    <p class="note-items"><i class="fa fa-times text-danger"></i> Ẩn với người dùng</p>
  </div>
</form>