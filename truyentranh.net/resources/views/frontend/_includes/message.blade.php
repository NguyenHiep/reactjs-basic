@if(!empty(session('message')) && !empty(session('status')))
  <div class="col-xs-12">
    <div class="alert alert-{{session('status')}} alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ session('message') }}
    </div>
  </div>
@endif
@php
  $html = '';
  if (count($errors) > 0):
    $html .= '<div class="col-xs-12">';
      $html .= '<ul class="list-unstyled alert alert-danger">';
      $html .= '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
      foreach ($errors->all() as $error):
        $html .= "<li>{$error}</li>";
      endforeach;
      $html .= '</ul>';
    $html .= '</div>';
  endif;
  echo $html;
@endphp
