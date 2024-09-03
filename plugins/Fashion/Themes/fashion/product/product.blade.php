@extends('layout.master')
@section('body-class', 'page-product')
@section('title', $product['meta_title'] ?: $product['name'])
@section('keywords', $product['meta_keywords'] ?: system_setting('base.meta_keyword'))
@section('description', $product['meta_description'] ?: system_setting('base.meta_description'))

@push('header')
<script src="{{ asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('vendor/zoom/jquery.zoom.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">
@if ($product['video'] && strpos($product['video'], '<iframe')===false)
  <script src="{{ asset('vendor/video/video.min.js') }}">
  </script>
  <link rel="stylesheet" href="{{ asset('vendor/video/video-js.min.css') }}">
  @endif
  <link rel="stylesheet" href="{{ asset('/_next/static/css/530b3bcaa61be7a3.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/53b65ec2bfa53fd4.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/81323f0215653416.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/d00c5b60fef94ded.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/93ed42daebf6e433.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/60eea8d1180f29eb.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/efa5a62f3eeec424.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/e5fa16b7f96ce8a0.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/2dbc91c213d03fce.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/0bb4eff91d5a9dd1.css') }}" data-precedence="next" />
  <link rel="stylesheet" href="{{ asset('/_next/static/css/8a4733f80582529c.css') }}" as="style" data-precedence="dynamic" />
  <script src="{{ asset('/_next/static/js/page-3ce974bb63d86c5a.js') }}" async=""></script>
  <link rel="stylesheet" href="{{ asset('/_next/static/css/maodian.css') }}" as="style" data-precedence="dynamic" />

  <style>


    .swiper-scrollbar-drag {
      background-color: #282931;
      width: 250px;
    }
    .my-bullet-active{
      background: rgba(255, 255, 255, 1);
    }
    
  </style>
  @endpush



  @php
  $iframeClass = request('iframe') ? 'd-none' : '';
  @endphp

  @section('content')
  @if (!request('iframe'))
  <x-shop-breadcrumb type="product" :value="$product['id']" />
  @endif
  <div id="product-app" v-cloak>
    <main class="_gP" data-e2e="PPG">
      <section aria-roledescription="carousel" class="_p4" style="position:relative;width:100%">
        <div class="_p6" data-scrollable="true">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide d-flex align-items-center justify-content-center" :class="!index ? 'active' : ''" v-for="image, index in images" :key="index">
                <img :src="image.popup" class="img-fluid" loading="lazy" height="441">
              </div>
            </div>
            <div class="swiper-pagination mobile-pagination"></div>
          </div>
        </div>
      </section>

      <section id="product-actions">
        <div class="_od" style="top:0px">
          <div class="_pe _gU">
            <div class="_pf" data-e2e="HN">{{ $product['name'] }}</div>
            <div class="_pg">

              <!-- <div class="_pi"><span class="_gZ">@{{ product.price_format }}</span></div> -->
              @hookwrapper('product.detail.price')
              @if ((system_setting('base.show_price_after_login') and current_customer()) or !system_setting('base.show_price_after_login'))
              <div class="price-wrap d-flex align-items-end">
                <div class="new-price fs-3 lh-1 fw-bold me-2" style="color: rgba(236, 45, 32, 1);">@{{ product.price_format }}</div>
                <div class="old-price text-muted text-decoration-line-through" v-if="product.price != product.origin_price && product.origin_price !== 0">
                  @{{ product.origin_price_format }}
                </div>
              </div>
              @else
              <div class="product-price">
                <div class="text-dark fs-6">{{ __('common.before') }} <a class="price-new fs-6 login-before-show-price" href="javascript:void(0);">{{ __('common.login') }}</a> {{ __('common.show_price') }}</div>
              </div>
              @endif

              @hook('product.detail.price.after')

              @endhookwrapper
            </div>
          </div>
          @hookwrapper('product.detail.variables')
          <div class="variables-wrap mb-md-4" v-if="source.variables.length">
            <div class="variable-group" v-for="variable, variable_index in source.variables" :key="variable_index">
              <p class="mb-2">@{{ variable.name }}</p>
              <div class="variable-info">
                <div
                  v-for="value, value_index in variable.values"
                  @click="checkedVariableValue(variable_index, value_index, value)"
                  :key="value_index"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  :title="value.image ? value.name : ''"
                  :class="[value.selected ? 'selected' : '', value.disabled ? 'disabled' : '', value.image ? 'is-v-image' : '']">
                  <span class="image" v-if="value.image"><img :src="value.image" class="img-fluid"></span>
                  <span v-else>@{{ value.name }}</span>
                </div>
              </div>
            </div>
          </div>
          @endhookwrapper
          <div class="_oh _g0">
            <div class="_oi">
              <div class="_kE _kB">
                <button aria-controls="selectedSize"
                  class="_zn _zq _zC _zF _zG _zo add_to_cart"
                  type="button"
                  :product-id="product.id"
                  :product-price="product.price"
                  :disabled="!product.quantity"
                  @click="addCart(false, this)">
                  <span class="_zz">
                    <span>
                      <span class="_gY" data-e2e="ATC">
                        Add to cart
                      </span>
                    </span>
                  </span>
                  <svg data-deep="icon-chevron-left" width="24" height="24" fill="none" class="_zB">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.707 5.293a1 1 0 0 0-1.414 0l-6 6a1 1 0 0 0 0 1.414l6 6a1 1 0 0 0 1.414-1.414L10.414 12l5.293-5.293a1 1 0 0 0 0-1.414Z" fill="currentColor"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <ul class="_oc">
            <li class="_vG">
              <div class="_vH">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.15 12a10 10 0 1 0 20 0 10 10 0 0 0-20 0Zm2 0a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm12.74-2.32a1 1 0 1 0-1.48-1.36l-4.73 5.16-1.76-2.12a1 1 0 1 0-1.54 1.28l2.5 3a1 1 0 0 0 1.5.04l5.5-6Z" fill="currentColor"></path>
                </svg>
              </div>
              <div class="_vI _vJ">Free shipping and free returns</div>
            </li>
            <li class="_vG">
              <div class="_vH">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.15 12a10 10 0 1 0 20 0 10 10 0 0 0-20 0Zm2 0a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm12.74-2.32a1 1 0 1 0-1.48-1.36l-4.73 5.16-1.76-2.12a1 1 0 1 0-1.54 1.28l2.5 3a1 1 0 0 0 1.5.04l5.5-6Z" fill="currentColor"></path>
                </svg>
              </div>
              <div class="_vI _vJ">30 day right of return</div>
            </li>
            <li class="_vG">
              <div class="_vH">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.15 12a10 10 0 1 0 20 0 10 10 0 0 0-20 0Zm2 0a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm12.74-2.32a1 1 0 1 0-1.48-1.36l-4.73 5.16-1.76-2.12a1 1 0 1 0-1.54 1.28l2.5 3a1 1 0 0 0 1.5.04l5.5-6Z" fill="currentColor"></path>
                </svg>
              </div>
              <div class="_vI _vJ">Quick deliveries</div>
            </li>
          </ul>
        </div>
      </section>

      <section id="tabs" class="_k2 _k3">
        <button role="button" class="_tX"   href="#details" data-e2e="tab-details" tabindex="0">Details</button>
        <button role="button" class="_tX"  href="#info" data-e2e="tab-inf" tabindex="0">Information</button>
        <button role="button" class="_tX"  href="#tech" data-e2e="tab-tech" tabindex="0">Tech</button>
      </section>
      <!-- <section id="tabs" class="_k2 _k3">
        <div class="et-hero-tabs-container"> 
            <a class="et-hero-tab" href="#details">Details</a> 
            <a class="et-hero-tab"href="#info">Information</a> 
            <a class="et-hero-tab" href="#tech">Tech</a> 
            <span class="et-hero-tab-slider"></span> 
        </div>
    </section> -->
      <section id="details" class="_g3">
        <div class="_hd">Details</div>
        <div class="slider-10-3-3 _g7">

          <div class="_lB" data-deep="scroll-container">
            <div class="product swiper-style-plus">
              <div class="swiper details-relations-swiper">
                <div class="swiper-wrapper">
                  <!--获取product的details 绑定到视图-->
                  @foreach ($product['details'] as $detail)
                  <div class="swiper-slide">
                    <div class="product-wrap">
                      <div class="image">
                        <a href="#">
                          <div class="image-old">
                            <img
                              data-sizes="auto"
                              data-src="{{ $detail['images'][0] ?? image_resize('', 400, 400) }}"
                              src="{{ image_resize('', 400, 400) }}"
                              class="img-fluid lazyload">
                          </div>
                        </a>
                      </div>
                      <div class="product-bottom-info">
                        <div class="product-name">{{ $detail['title'] }}</div>
                        <div>{{ $detail['desc'] }}</div>
                      </div>
                    </div>

                  </div>
                  @endforeach
                </div>
              </div>
              <!-- <div class="swiper-pagination relations-pagination"></div> -->
              <div class="swiper-scrollbar details-swiper-scrollbar"></div>
              <div class="swiper-button-prev details-relations-swiper-prev"></div>
              <div class="swiper-button-next details-relations-swiper-next"></div>
            </div>

          </div>
        </div>
      </section>
      <section id="info" class="_g3">
        {!! $product['description'] !!}
      </section>
      <section id="tech" class="_g3">
        <div class="_g4">
          <div class="_hd">Tech</div>
        </div>
        <div class="slider-4-3-2">

          <div class="_lB" data-deep="scroll-container">
            <div class="tech swiper-style-plus">
              <div class="swiper tech-relations-swiper">
                <div class="swiper-wrapper">
                  @foreach ($product['techs'] as $tech)
                  <div class="swiper-slide">
                    <div class="product-wrap">
                      <div class="image">
                        <a href="#">
                          <div class="image-old">
                            <img
                              data-sizes="auto"
                              data-src="{{ $tech['images'][0] ?? image_resize('', 400, 400) }}"
                              src="{{ image_resize('', 400, 400) }}"
                              class="img-fluid lazyload">
                          </div>
                        </a>
                      </div>
                      <div class="product-bottom-info">
                        <div class="product-name">{{ $tech['title'] }}</div>
                        <div>{{ $tech['desc'] }}</div>
                      </div>
                    </div>

                  </div>
                  @endforeach
                </div>
              </div>
              <div class="swiper-scrollbar tech-swiper-scrollbar"></div>
              <div class="swiper-button-prev tech-relations-swiper-prev"></div>
              <div class="swiper-button-next tech-relations-swiper-next"></div>
            </div>
            <div class="_lC" data-deep="scroll-content">


            </div>

          </div>
        </div>
      </section>
      <section id="related" class="_g5">
        <div class="_g4">
          <div class="_hd" data-deep="title">Products you might like</div>
        </div>
        <div class="slider-13-4-2">

          <div class="_lB" data-deep="scroll-container">
            @if ($relations && !request('iframe'))
            <div class="relations-wrap mt-2 mt-md-5 product-mb-block">
              <div class="container position-relative">
                <div class="product swiper-style-plus">
                  <div class="swiper relations-swiper">
                    <div class="swiper-wrapper">
                      @foreach ($relations as $item)
                      <div class="swiper-slide">
                        @include('shared.product', ['product' => $item])
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <!-- <div class="swiper-pagination relations-pagination"></div> -->
                  
                  <div class="swiper-button-prev relations-swiper-prev"></div>
                  <div class="swiper-button-next relations-swiper-next"></div>
                </div>
                
              </div>
              <div class="swiper-scrollbar"></div>
            </div>
            @endif
          </div>
        </div>
      </section>
    </main>
  </div>

  @endsection

  @push('add-scripts')
  <script>
    let swiperMobile = null;
    const isIframe = bk.getQueryString('iframe', false);

    let app = new Vue({
      el: '#product-app',

      data: {
        selectedVariantsIndex: [], // 选中的变量索引
        images: [],
        product: {
          id: 0,
          images: "",
          model: "",
          origin_price: 0,
          origin_price_format: "",
          position: 0,
          price: 0,
          price_format: "",
          quantity: 0,
          sku: "",
          details: @json($product['details']),
          techs: @json($product['techs']),
        },
        quantity: 1,
        source: {
          skus: @json($product['skus']),
          variables: @json($product['variables'] ?? []),
        }
      },

      beforeMount() {
        const skus = JSON.parse(JSON.stringify(this.source.skus));
        const skuDefault = skus.find(e => e.is_default)
        this.selectedVariantsIndex = skuDefault.variants

        // 为 variables 里面每一个 values 的值添加 selected、disabled 字段
        if (this.source.variables.length) {
          this.source.variables.forEach(variable => {
            variable.values.forEach(value => {
              this.$set(value, 'selected', false)
              this.$set(value, 'disabled', false)
            })
          })

          this.checkedVariants()
          this.getSelectedSku(false);
          this.updateSelectedVariantsStatus()
        } else {
          // 如果没有默认的sku，则取第一个sku的第一个变量的第一个值
          this.product = skus[0];
          // 获取Controller 接口中返回的商品图片
          this.images = @json($product['images'] ?? []);
        }
      },

      methods: {
        checkedVariableValue(variable_index, value_index, value) {
          $('.product-image .swiper .swiper-slide').eq(0).addClass('active').siblings().removeClass('active');
          this.source.variables[variable_index].values.forEach((v, i) => {
            v.selected = i == value_index
          })

          this.updateSelectedVariantsIndex();
          this.getSelectedSku();
          this.updateSelectedVariantsStatus()
        },

        // 把对应 selectedVariantsIndex 下标选中 variables -> values 的 selected 字段为 true
        checkedVariants() {
          this.source.variables.forEach((variable, index) => {
            variable.values[this.selectedVariantsIndex[index]].selected = true
          })
        },

        getSelectedSku(reload = true) {
          // 通过 selectedVariantsIndex 的值比对 skus 的 variables
          const sku = this.source.skus.find(sku => sku.variants.toString() == this.selectedVariantsIndex.toString())
          this.images = @json($product['images'] ?? [])

          if (reload) {
            this.images.unshift(...sku.images)
          }

          this.product = sku;

          if (swiperMobile) {
            swiperMobile.slideTo(0, 0, false)
          }

          this.$nextTick(() => {
            $('#zoom img').attr('src', $('#swiper a').attr('data-image'));
            $('#zoom').trigger('zoom.destroy');
            $('#zoom').zoom({
              url: $('#swiper a').attr('data-zoom-image')
            });
          })

          // closeVideo()
        },

        addCart(isBuyNow = false) {
          bk.addCart({
            sku_id: this.product.id,
            quantity: this.quantity,
            isBuyNow
          }, null, () => {
            if (isIframe) {
              let index = parent.layer.getFrameIndex(window.name); //当前iframe层的索引
              parent.bk.getCarts();

              setTimeout(() => {
                parent.layer.close(index);

                if (isBuyNow) {
                  parent.location.href = 'checkout'
                } else {
                  parent.$('.btn-right-cart')[0].click()
                }
              }, 400);
            } else {
              if (isBuyNow) {
                location.href = 'checkout'
              }
            }
          });
        },

        updateSelectedVariantsIndex() {
          // 获取选中的 variables 内 value的 下标 index 填充到 selectedVariantsIndex 中
          this.source.variables.forEach((variable, index) => {
            variable.values.forEach((value, value_index) => {
              if (value.selected) {
                this.selectedVariantsIndex[index] = value_index
              }
            })
          })
        },

        updateSelectedVariantsStatus() {
          // skus 里面 quantity 不为 0 的 sku.variants
          const skus = this.source.skus.filter(sku => sku.quantity > 0).map(sku => sku.variants);
          this.source.variables.forEach((variable, index) => {
            variable.values.forEach((value, value_index) => {
              const selectedVariantsIndex = this.selectedVariantsIndex.slice(0);

              selectedVariantsIndex[index] = value_index;
              const selectedSku = skus.find(sku => sku.toString() == selectedVariantsIndex.toString());
              if (selectedSku) {
                value.disabled = false;
              } else {
                value.disabled = true;
              }
            })
          });
        },
      }
    });

    $(document).on("mouseover", ".product-image #swiper .swiper-slide a", function() {
      $(this).parent().addClass('active').siblings().removeClass('active');
      $('#zoom').trigger('zoom.destroy');
      $('#zoom img').attr('src', $(this).attr('data-image'));
      $('#zoom').zoom({
        url: $(this).attr('data-zoom-image')
      });
      // closeVideo()
    });

    var swiper = new Swiper("#swiper", {
      direction: "vertical",
      slidesPerView: 1,
      spaceBetween: 3,
      breakpoints: {
        375: {
          slidesPerView: 3,
          spaceBetween: 3,
        },
        480: {
          slidesPerView: 4,
          spaceBetween: 27,
        },
        768: {
          slidesPerView: 6,
          spaceBetween: 3,
        },
      },
      navigation: {
        nextEl: '.new-feature-slideshow-next',
        prevEl: '.new-feature-slideshow-prev',
      },
      // 如果需要分页器
      pagination: {
        el: '.pc-pagination',
        clickable: true,
        bulletActiveClass: 'my-bullet-active',
      },
      observer: true,
      observeParents: true
    });

    var relationsSwiper = new Swiper('.relations-swiper', {
      watchSlidesProgress: true,
      height: 384,//你的slide高度      slidesPerView: 3,
      slidesPerView: 1,
      centeredSlides: false,
      slidesPerGroupSkip: 1,
      grabCursor: true,
      dragSize: 250, //滚动条滑块的长度
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
      spaceBetween: 30,
      // 如果需要前进后退按钮
      navigation: {
        nextEl: '.relations-swiper-next',
        prevEl: '.relations-swiper-prev',
      },
      scrollbar: {
        el: '.swiper-scrollbar',
        dragSize: 250
      },
      // 如果需要分页器
      pagination: {
        el: '.relations-pagination',
        clickable: true,
      },
    })
    relationsSwiper.scrollbar.$el.css('height','2px');
    var relationsSwiper1 = new Swiper('.details-relations-swiper', {
      watchSlidesProgress: true,
      // autoHeight: true,
      height: 384,//你的slide高度
      slidesPerView: 3,
      centeredSlides: false,
      slidesPerGroupSkip: 1,
      grabCursor: true,
      dragSize: 250, //滚动条滑块的长度
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
      spaceBetween: 30,
      // 如果需要前进后退按钮
      navigation: {
        nextEl: '.details-relations-swiper-next',
        prevEl: '.details-relations-swiper-prev',
      },
      scrollbar: {
        el: '.details-swiper-scrollbar',
        dragSize: 250,
      },

      // 如果需要分页器
      pagination: {
        el: '.relations-pagination',
        clickable: true,
      },
    })
    relationsSwiper1.scrollbar.$el.css('height','2px');
    var techSwiper = new Swiper('.tech-relations-swiper', {
      watchSlidesProgress: true,
      height: 384,//你的slide高度      slidesPerView: 3,
      centeredSlides: false,
      slidesPerGroupSkip: 1,
      grabCursor: true,
      dragSize: 250, //滚动条滑块的长度
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
      spaceBetween: 30,
      // 如果需要前进后退按钮
      navigation: {
        nextEl: '.tech-relations-swiper-next',
        prevEl: '.tech-relations-swiper-prev',
      },
      scrollbar: {
        el: '.tech-swiper-scrollbar',
        dragSize: 250,
      },

      // 如果需要分页器
      pagination: {
        el: '.relations-pagination',
        clickable: true,
      },
    })
    techSwiper.scrollbar.$el.css('height','2px');
    var productSwiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
        pagination: {
          el: ".mobile-pagination",
          clickable: true,
          bulletActiveClass: 'my-bullet-active',
        },
        observer: true,
        observeParents: true
      // pagination: {
      //   el: ".swiper-pagination",
      //   // clickable: true,
      //   // renderBullet: function(index, className) {
      //   //   //return '<div class="_p8" style="left: calc(50% - 62px); transition: left 0.6s;"><div class="_qb ' + className + '">-</div></div>';
      //   //   return '<span class="' + className + '">' + (index + 1) + "</span>";
      //   // },
      //   // navigation: {
      //   //   nextEl: ".swiper-button-next",
      //   //   prevEl: ".swiper-button-prev",
      //   // },
      // }
    })
    @if(is_mobile())
    swiperMobile = new Swiper("#swiper-mobile", {
      slidesPerView: 1,
      pagination: {
        el: ".mobile-pagination",
      },
      observer: true,
      observeParents: true
    });
    @endif

    $(document).ready(function() {
      $('#zoom').trigger('zoom.destroy');
      $('#zoom').zoom({
        url: $('#swiper a').attr('data-zoom-image')
      });

    });

    const selectedVariantsIndex = app.selectedVariantsIndex;
    const variables = app.source.variables;

    const selectedVariants = variables.map((variable, index) => {
      return variable.values[selectedVariantsIndex[index]]
    });

  </script>

  @endpush