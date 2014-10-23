<div class="banners-top">
  @foreach($banners as $banner)
    <a href="{{$banner->url}}" class="banner" target="_blank">{{$banner->content}}</a>
  @endforeach
</div>