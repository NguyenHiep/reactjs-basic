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
                <a href="http://truyentranh.net/killing-morph/Chap-035" class="LeftArrow" title="Killing Morph Chap 035">
                  <img src="http://cdn.truyentranh.net/frontend/images/arrowleft.jpg" alt="leftarrow">
                </a>
              </div>
              <div class="col-xs-8 col-lg-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @for($i = 1; $i<=999; $i++)
                    <option value="http://truyentranh.net/killing-morph/Chap-{{ $i }}">
                      Killing Morph Chap {{ $i }}
                    </option>
                    @endfor
                  </optgroup>
                </select>
              </div>
              <div class="col-xs-2 col-lg-2 paddfixboth rightalign">
                <a href="http://truyentranh.net/killing-morph/Chap-037" class="RightArrow" title="Killing Morph Chap 037">
                  <img src="http://cdn.truyentranh.net/frontend/images/arrowright.jpg" alt="rightarrow">
                </a>
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
            <button type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn-diepage"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Báo lỗi chương
            </button>
            <div class="modal fade bs-example-modal-sm">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form name="report-form" id="report-form" method="POST" action="#">
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <input type="hidden" name="cid" value="{{ $chapter->id }}">
                    <div class="modal-header">
                      <h4 id="gridSystemModalLabel" class="modal-title">Báo lỗi chương</h4>
                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      <textarea rows="3" name="message" placeholder="Mô tả lỗi" class="form-link"></textarea>
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
      <div class="row chapter-toolbar ">
        <div class="col-md-7 col-sm-6">
          <h1 class="chapter-title">{{ $chapter->name }}</h1>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 paddfixboth">
          <div class="chapter-control">
            <div class="row">
              <div class="col-xs-2 col-lg-2 paddfixboth">
                <a href="http://truyentranh.net/killing-morph/Chap-035" class="LeftArrow" title="Killing Morph Chap 035">
                  <img src="http://cdn.truyentranh.net/frontend/images/arrowleft.jpg" alt="leftarrow">
                </a>
              </div>
              <div class="col-xs-8 col-lg-8 paddselectfix">
                <select class="dropdown-manga" data-placeholder="Chọn chương truyện" rel="chap-select">
                  <optgroup label="Tổng hợp">
                    @for($i = 1; $i<=999; $i++)
                      <option value="http://truyentranh.net/killing-morph/Chap-{{ $i }}">
                        Killing Morph Chap {{ $i }}
                      </option>
                    @endfor
                  </optgroup>
                </select>
              </div>
              <div class="col-xs-2 col-lg-2 paddfixboth rightalign">
                <a href="http://truyentranh.net/killing-morph/Chap-037" class="RightArrow" title="Killing Morph Chap 037">
                  <img src="http://cdn.truyentranh.net/frontend/images/arrowright.jpg" alt="rightarrow">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
