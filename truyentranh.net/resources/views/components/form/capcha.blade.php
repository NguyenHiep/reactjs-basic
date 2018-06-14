@php $key = 'g-recaptcha-response' @endphp
<div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-theme="dark"></div>
@if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif