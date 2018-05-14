@if(!empty(session('message')) && !empty(session('status')))
  <div class="col-xs-12">
    <div class="alert alert-{{session('status')}} alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ session('message') }}
    </div>
  </div>
@endif