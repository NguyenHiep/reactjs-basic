@extends('layouts.app')

@section('content')
<div class="breadcrumb-contain">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="{{ url($book->slug) }}" title="{{ $book->name }}">{{ $book->name }}</a></li>
          <li><a href="javascript:;" title="{{ $chapter->name }}"> {{ $chapter->name }}</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section id="chapter_detail">
  <div class="container">
    <div class="wraper-content">
      <div class="row chapter-toolbar">
        <div class="col-md-7 col-sm-6">
          <h1 class="chapter-title">{{ $chapter->name }}</h1>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 paddfixboth">
          <div class="chapter-control">
            <div class="row">
              <div class="col-xs-2 col-lg-2 paddfixboth">
                @if(!empty($previous))
                <a href="{{ url($book->slug.'/'.$previous->slug) }}" title="{{$previous->name}}" class="LeftArrow">
                  <img src="http://cdn.truyentranh.net/frontend/images/arrowleft.jpg" alt="leftarrow">
                </a>
                @endif
              </div>
              <div class="col-xs-8 col-lg-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @if(isset($list_chapters))
                    @foreach($list_chapters as $objchapter)
                      @php $selected = ($chapter->slug === $objchapter->slug) ?  'selected' : ''; @endphp
                      <option value="{{ url($objchapter->book_slug.'/'.$objchapter->slug) }}" {{ $selected }}>{{ $objchapter->name }}</option>
                    @endforeach
                    @endif
                  </optgroup>
                </select>
              </div>
              <div class="col-xs-2 col-lg-2 paddfixboth rightalign">
                @if(!empty($next))
                  <a href="{{ url($book->slug.'/'.$next->slug) }}" title="{{$next->name}}" class="RightArrow">
                    <img src="http://cdn.truyentranh.net/frontend/images/arrowright.jpg" alt="rightarrow">
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="likeshare-fb text-center">
            <ul id="socialBtn">
              <li>
                <div class="fb-like" data-href="http://truyentranh.net/neu-em-vui/Chap-012" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
              </li>
              <li><a href="#" data-href="http://truyentranh.net/neu-em-vui/Chap-012" rel="share-fb" title="Share Facebook" class="Facebook"><img src="http://cdn.truyentranh.net/images/fb-share.jpg" alt=""></a>
              </li>
              <li></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="die-linknd text-center">
            <button type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn-diepage"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Báo lỗi chương
            </button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
         <div class="chapter-content">
           @if(count($chapter) > 0)
             {!! $chapter->content !!}
           @endif
         </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="likeshare-fb text-center">
            <ul id="socialBtn">
              <li>
                <div class="fb-like" data-href="http://truyentranh.net/neu-em-vui/Chap-012" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
              </li>
              <li><a href="#" data-href="http://truyentranh.net/neu-em-vui/Chap-012" rel="share-fb" title="Share Facebook" class="Facebook"><img src="http://cdn.truyentranh.net/images/fb-share.jpg" alt=""></a>
              </li>
              <li></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="die-linknd text-center">
            <button type="button" data-toggle="modal" data-target="#boxReport" class="btn-diepage"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Báo lỗi chương
            </button>
            <div class="modal fade bs-example-modal-sm" id="boxReport">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form name="report-form" id="report-form" method="POST" action="{{ route('front.report.chapter')}}">
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <input type="hidden" name="cid" value="{{ $chapter->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-header">
                      <h4 id="gridSystemModalLabel" class="modal-title">Báo lỗi chương</h4>
                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      @php $key = 'content' @endphp
                      <textarea rows="3" name="{{$key}}" placeholder="Mô tả lỗi" class="form-link">{{old($key)}}</textarea>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      @php $key = 'g-recaptcha-response' @endphp
                      <div class="g-recaptcha" data-sitekey="6LejnF4UAAAAADKoPPqyOIlZqIpo5_ss2WVJwufN" data-theme="dark" ata-callback="YourOnSubmitFn"></div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-green">Gửi thông báo</button>
                      <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row chapter-toolbar">
        <div class="col-md-7 col-sm-6">
          <h2 class="chapter-title">{{ $chapter->name }}</h2>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 paddfixboth">
          <div class="chapter-control">
            <div class="row">
              <div class="col-xs-2 col-lg-2 paddfixboth">
                @if(!empty($previous))
                  <a href="{{ url($book->slug.'/'.$previous->slug) }}" title="{{$previous->name}}" class="LeftArrow">
                    <img src="http://cdn.truyentranh.net/frontend/images/arrowleft.jpg" alt="leftarrow">
                  </a>
                @endif
              </div>
              <div class="col-xs-8 col-lg-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @if(isset($list_chapters))
                      @foreach($list_chapters as $objchapter)
                        @php $selected = ($chapter->slug === $objchapter->slug) ?  'selected' : ''; @endphp
                        <option value="{{ url($objchapter->book_slug.'/'.$objchapter->slug) }}" {{ $selected }}>{{ $objchapter->name }}</option>
                      @endforeach
                    @endif
                  </optgroup>
                </select>
              </div>
              <div class="col-xs-2 col-lg-2 paddfixboth rightalign">
                @if(!empty($next))
                  <a href="{{ url($book->slug.'/'.$next->slug) }}" title="{{$next->name}}" class="RightArrow">
                    <img src="http://cdn.truyentranh.net/frontend/images/arrowright.jpg" alt="rightarrow">
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
