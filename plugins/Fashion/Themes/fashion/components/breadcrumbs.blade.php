@unless ($breadcrumbs->isEmpty())
<div class="breadcrumb-wrap">
  <div class="container" style="height: 99px;">
    <nav aria-label="breadcrumb" style="padding-top: 30px;">
      <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
          @if (isset($breadcrumb['url']) && $breadcrumb['url'])
          <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
          @else
          <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['title'] }}</li>
          @endif
        @endforeach
      </ol>
    </nav>
  </div>
</div>
@endunless