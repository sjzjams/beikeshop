@extends('layout.master')
@section('body-class', 'page-categories-home')
@section('title', $category->description->meta_title ?: system_setting('base.meta_title', 'BeikeShop开源好用的跨境电商系统') . ' - ' . $category->description->name)
@section('keywords', $category->description->meta_keywords ?: system_setting('base.meta_keyword'))
@section('description', $category->description->meta_description ?: system_setting('base.meta_description'))

@push('header')
<script src="{{ asset('vendor/scrolltofixed/jquery-scrolltofixed-min.js') }}"></script>
@endpush

@section('content')
<x-shop-breadcrumb type="page_category" :value="$category['id']" />

<div class="container">
  <div class="row">

    @if ($active_page_categories)
    <div class="col-lg-3 col-12">
      <div class="card mb-3 shadow-sm h-min-300 x-fixed-top">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="card-title">{{ __('product.category') }}</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <!-- @foreach ($active_page_categories as $category)
                  <li class="list-group-item p-0">
                    <a href="{{ type_route('page_category', $category) }}"
                      class="p-2 list-group-item-action nav-link">{{ $category->description->title }}</a>
                  </li>
                @endforeach -->
            @foreach ($category_pages as $page)
            <li class="list-group-item p-0">
              <a href="{{ type_route('page', $page) }}" class="p-2 list-group-item-action nav-link">{{ $page->description->title }}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    @endif
    <div class="col-lg-9 col-12">

      <div class="card shadow-sm page-content">
          <div class="card-body h-min-600 p-lg-4">
          @if ($category_pages->count() > 0)
          @foreach ($category_pages as $page)
          @if ($loop->first)
            <h2 class="mb-3">{{ $page->description->title }}</h2>

            @if ($page->category)
              <div class="text-secondary opacity-75 mb-4">
                <span class="me-3"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> {{ __('page_category.author') }}: {{ $page->author }}</span>
                <span class="me-3"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> {{ __('page_category.created_at') }}: {{ $page->created_at }}</span>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> {{ __('page_category.views') }}: {{ $page->views }}</span>
              </div>
            @endif
            {!! $page->description->content !!}

          @endif
          @endforeach
          @else
          <x-shop-no-data />
          @endif
          </div>
        </div>
    </div>

  </div>
</div>
@endsection