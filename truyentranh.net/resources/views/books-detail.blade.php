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
      <div class="row">
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
      <div class="row ">
        <div class="col-lg-12">
         <div class="chapter-content">
           @if(count($chapter) > 0)
             {!! $chapter->content !!}
           @endif
         </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
