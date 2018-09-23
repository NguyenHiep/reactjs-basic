@extends('layouts.app')

@section('seo_title', 'Đọc truyện tranh online - Truyện gì cũng có - TruyentranhFc')
@section('seo_keywords', 'Đọc truyện tranh online, Truyện tranh, Truyện hành động')
@section('seo_description', '❶❶✅ Web đọc truyện tranh online lớn nhất được cập nhật liên tục mỗi ngày - Cùng tham gia đọc truyện và thảo luận với hơn ✅1 triệu thành viên tại TruyentranhFc')

@section('sliders')
  @if(!empty($show_slider) && count($show_slider) > 0)
    <section id="slider_top" class="bg-main-section"></section>
  @endif
  @push('scripts')
  <script type="text/jsx">
    class Slider extends React.Component{
      render() {
        let list_chapters = this.props.list_chapter.map((chapter, index) => {
          if (index > 0)
            return true;
          return <p key={chapter.id} className="chapter">
            <a href={chapter.url} title={chapter.name} className="Chapter">{chapter.episodes}</a>
          </p>
        });
        return (
          <div>
            <div className="home-sliders col-md-12">
              <div className="hot-manga col-md-12 topfixpadd">
                <div className="thumbnails">
                  <a href={this.props.slug} className="slick-item">
                    <img className="pr-2" src={this.props.image} alt={this.props.name}/>
                    <h3 className="manga-title">{this.props.name}</h3>
                  </a>
                </div>
                <div className="caption">
                  {list_chapters}
                </div>
              </div>
            </div>
          </div>
        );
      };
    }
    class ItemsHot extends React.Component {
      constructor(props) {
        super(props);
        this.state = {
          items_hot: []
        };
      }
      getListItemsHot() {
        axios.get("{{ route('api.books.listhot') }}")
          .then(response => {
            this.setState({items_hot: response.data.data});
          })
          .catch(function (error) {
            // handle error
            console.log(error);
          })
      }
      componentDidMount() {
        this.getListItemsHot();
      }

      render() {
        let item_hot = this.state.items_hot.map((items, index) => {
         //let result = '';
         let result = <Slider
            key          = {items.id}
            url          = {items.url}
            image        = {items.image}
            name         = {items.name}
            name_dif     = {items.name_dif}
            categories   = {items.categories}
            author       = {items.author}
            content      = {items.content}
            list_chapter = {items.chapters}
          />;
          return result;
        });
        return (
        <div className="container">
          <div className="row">
            <div className="col-12">
              <h3 className="tilte-update">Truyện hot mới ra lò</h3>
            </div>
            {item_hot}
          </div>
        </div>
        );
      }
    }
    var target = document.getElementById('slider_top');
    ReactDOM.render(<ItemsHot/>, target);
  </script>
  @endpush

@endsection
@section('content')
<div class="wraper-content">
  <h3 class="title-body">Truyện mới đăng</h3>
  <div class="row">
    @foreach($books_new as $book)
      <div class="col-xs-12 col-md-6">
        <div class="media mainpage-manga mt-0">
          <a href="{{ url($book->slug) }}" class="tooltips">
            @if(!empty($book->image))
              <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
            @endif
            <span>
              <img src="{{ PATH_IMAGE_FRONTEND.'callout.gif' }}" class="callout" alt="callout"/>
              <div class="description">
                <strong>Tên khác:</strong>{{ $book->name_dif }}<br />
                <strong>Thể loại: </strong>
                @php
                  if(!empty($book->categories)){
                  $html = '';
                  foreach( $book->categories as $id){
                    $html .= array_get($categories, $id).', ';
                  }
                  echo rtrim($html, ', ');
                 }
                @endphp
                <br />
                <strong>Tác giả:</strong>{{ $book->author }}<br />
                <strong>Nội dung:</strong>{!! Str::words($book->content, 40,'...') !!}
              </div>
             </span>
          </a>
          <div class="media-body">
            <h4 class="manga-newest"><a href="{{ url($book->slug) }}">{{ $book->name }}</a></h4>
            <p class="description">
              <strong>Tên khác:</strong>{{ $book->name_dif }}<br />
              <strong>Thể loại: </strong>
              @php
                if(!empty($book->categories)){
                $html = '';
                foreach( $book->categories as $id){
                  $html .= "<a href='#'>".array_get($categories, $id)."</a>, ";
                }
                echo rtrim($html, ', ');
               }
              @endphp
              <br />
              <strong>Tác giả:</strong>{{ $book->author }}<br />
              <strong>Nội dung:</strong>{!!  Str::words($book->content, 20,'...') !!}
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <h3 class="title-body">Truyện mới nhất</h3>
  <div class="row">
    @foreach($books_update as $book)
      <div class="col-xs-12 col-lg-6">
        <div class="media mainpage-manga mt-0">
          <a href="{{ url($book->slug) }}" class="tooltips">
            @if(!empty($book->image))
              <img class="pr-2" src="{!! asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image) !!}" alt="{{ $book->name }}" />
            @endif
            <span>
              <img src="{{ PATH_IMAGE_FRONTEND.'callout.gif' }}" class="callout" alt="callout"/>
              <div class="description">
                <strong>Tên khác:</strong>{{ $book->name_dif }}<br />
                <strong>Thể loại: </strong>
                @php
                  if(!empty($book->categories)){
                  $html = '';
                  foreach( $book->categories as $id){
                    $html .= array_get($categories, $id).', ';
                  }
                  echo rtrim($html, ', ');
                 }
                @endphp
                <br />
                <strong>Tác giả:</strong>{{ $book->author }}<br />
                <strong>Nội dung:</strong>{!!  Str::words($book->content, 20,'...') !!}
              </div>
            </span>
          </a>
          
          <div class="media-body">
            <h4 class="manga-newest"><a href="{{ url($book->slug) }}">{{ $book->name }}</a></h4>
            <div class="row">
              <div class="col-12">
                <ul class="hotup-list list-unstyled clearfix">
                  @if(count($book->chapters) > 0 )
                    @foreach( $book->chapters as $chapter)
                      @if ($loop->iteration > 8)
                        @break
                      @endif
                      <li><a class="latest-chap" href="{{ route('front.books.showdetail', ['chapter_slug' => $chapter->slug]) }}" target="_blank" title="{{$chapter->name}}">{{$chapter->episodes}}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
      <div class="col-12">
        <div class="viewmore-button">
          <a href="{{ route('front.categories.showall') }}" title="Xem thêm">Xem thêm <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
  </div>
</div>
<div id="react-app"></div>
<div id="getResult1"></div>
@push('scripts')
<script type="text/jsx">
  /*class ItemsHot extends React.Component {
    render() {
      let list_chapters = this.props.list_chapter.map((chapter, index) => {
        return <p key={chapter.id} className="chapter">
          <a href={chapter.url} title={chapter.name} className="Chapter">{chapter.episodes}</a>
        </p>
      });
      return (
        <div className="home-sliders col-md-12">
          <div className="hot-manga col-md-12 topfixpadd">
            <div className="thumbnails">
              <a href={this.props.slug} className="slick-item">
                <img className="pr-2" src={this.props.image} alt={this.props.name} />
                <h3 className="manga-title">{this.props.name}</h3>
              </a>
            </div>
            <div className="caption">
              {list_chapters}
            </div>
          </div>
        </div>
      );
    }
  }*/
  class ItemsUpdate extends React.Component {
    render() {
      return (
        <div><h1>Items update</h1></div>
      );
    }
  }
  class ItemsNew extends React.Component {
    render() {
      return (
        <div><h1>Items new</h1></div>
      );
    }
  }

  class HomePage extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        /*items_hot: [],*/
        items_update: [],
        items_new: [],
      };
      //this.getListItemsHot = this.getListItemsHot.bind(this);
    }
    getListItemsHot() {
      axios.get("{{ route('api.books.listhot') }}")
        .then(response => {
          this.setState({items_hot: response.data.data});
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
    }
    getListItemsUpdate() {
      axios.get("{{ route('api.books.listupdate') }}")
        .then(response => {
          this.setState({items_update: response.data.data});
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
    }
    getListItemsNew() {
      axios.get("{{ route('api.books.listnew') }}")
        .then(response => {
          this.setState({items_new: response.data.data});
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
    }
    componentDidMount() {
      //this.getListItemsHot();
      this.getListItemsUpdate();
      this.getListItemsNew();
    }

    render() {
      /*let item_hot = this.state.items_hot.map((items, index) => {
        let result = '';
        if (items.status) {
          result = <ItemsHot
            key          = { items.id }
            url          = { items.url }
            image        = { items.image }
            name         = { items.name }
            name_dif     = { items.name_dif }
            categories   = { items.categories }
            author       = { items.author }
            content      = { items.content }
            list_chapter = { items.chapters }
          />
        }
        return result;
      });
*/
      let item_update = <ItemsUpdate/>;
      let item_new = <ItemsNew/>;
      return (
        <div>
          {item_update}
          {item_new}
        </div>
      );
    }
  }
  var target = document.getElementById('react-app');
  ReactDOM.render(<HomePage/>, target);
</script>
@endpush
@endsection