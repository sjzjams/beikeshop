<style type="text/css">
  .module-image-info-4 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    /* 创建两列等宽的列 */
    grid-template-rows: repeat(2, 1fr);
    /* 创建两行等高的行 */
    gap: 2.5rem;
    /* 设置列之间的间距 */
  }

  .grid-item {
    position: relative;
    /* 使 .overlay 相对于 .grid-item 定位 */
    display: block;
  }

  #item1 {
    grid-area: 1 / 1 / 2 / 2;
    /* 第一行第一列 */
  }

  #item2 {
    grid-area: 1 / 2 / 2 / 3;
    /* 第一行第二列 */
  }

  #item3 {
    grid-area: 2 / 1 / 3 / 2;
    /* 第二行第一列 */
  }

  #item4 {
    grid-area: 2 / 2 / 3 / 3;
    /* 第二行第二列 */
  }

  .rounded {
    border-radius: 8px !important;
    /* 设置圆角的半径 */
  }

  .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    /* background-color: rgba(0, 0, 0, 0.5); */
    /* 背景颜色和透明度 */
    color: black;
    /* 文字颜色 */
    padding: 10px;
    /* 内边距 */
    font-size: 24px;
    /* 字体大小 */
    font-family: 'SFArabic', sans-serif;
    /* 使用 SFArabic 字体 */
  }

  .text::before {
    content: '';
    /* 创建一个空的内容 */
    display: inline-block;
    /* 使伪元素与文本在同一行 */
    width: 25px;
    /* 设置宽度 */
    height: 25px;
    /* 设置高度 */
    background-color: red;
    /* 设置背景颜色为红色 */
    margin-right: 20px;
    /* 设置右边距以与文字分开 */
    vertical-align: middle;
    /* 垂直居中对齐 */
  }

  .grid-item img {
    width: 100%;
    /* 图片宽度占满整个格栅 */
    height: auto;
    /* 保持图片的宽高比 */
  }

  /* 设定图片的固定尺寸 */
  @media (min-width: 768px) {


    /* 当屏幕宽度大于等于 768px 时 */
    .grid-item img {
      width: 701px;
      /* 设置图片的宽度 */
      height: 641px;
      /* 设置图片的高度 */
      object-fit: cover;
      /* 保持图片的宽高比 */
    }

  }

  /* 移动端适配 */
  @media (max-width: 767px) {
    .module-image-info-4 {
      gap: 1.5rem;
    }

    /* 当屏幕宽度小于 768px 时 */
    .grid-item img {
      width: 100%;
      /* 图片宽度占满整个格栅 */
      height: auto;
      /* 保持图片的宽高比 */
    }

    .overlay {
      /* bottom: 15px; */
      /* 调整底部距离以适应小屏幕 */
      left: 10px;
      /* 调整左边距离以适应小屏幕 */
      font-size: 14px;
    }

    .text::before {
      width: 15px;
      height: 15px;
      margin-right: 6px;
    }
  }

  /* 三列格栅布局 */
  .module-image-info-3 {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    /* 创建三列等宽的列 */
    gap: 1rem;
    /* 设置列之间的间距 */
  }

  .column {
    display: flex;
    justify-content: center;
    /* 水平居中对齐 */

  }

  .text-column {

    font-size: 14px;
    font-family: 'SFArabic', sans-serif;
    /* 使用 SFArabic 字体 */
    line-height: 30px;
  }

  .image-column {
    position: relative;
    /* 使图片相对于容器定位 */
  }

  .image {
    width: 335px;
    /* 图片宽度 */
    /* height: 500px; */
    /* 图片高度 */
    object-fit: cover;
    /* 保持图片的宽高比 */
  }

  .double-images {
    display: grid;
    grid-template-columns: 1fr;
    /* 单列 */
    grid-template-rows: 200px 258px;
    /* 两行不同高度 */
    gap: 1rem;
  }

  .top-image,
  .bottom-image {
    width: 335px;
    /* 图片宽度 */
    height: 100%;
    /* 图片高度 */
    object-fit: cover;
    /* 保持图片的宽高比 */
  }

  /* 移动端适配 */
  @media (max-width: 767px) {

    /* 当屏幕宽度小于 768px 时 */
    .module-image-info.grid-3 {
      /* grid-template-columns: 1fr; */
      /* 单列布局 */
      grid-template-rows: auto;
    }

    .image {
      width: 100%;
      /* 图片宽度占满整个容器 */
      height: auto;
      /* 保持图片的宽高比 */
    }

    .double-images {
      grid-template-rows: auto;
      /* 动态行高 */
    }

    .top-image,
    .bottom-image {
      width: 100%;
      /* 图片宽度占满整个容器 */
      /* height: auto; */
      /* 保持图片的宽高比 */
    }
  }

  .grid-container {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 10px;
    /* 间距 */
  }

  .item {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
  }

  /* 桌面端样式 */
  /* .item-1 { background-color: lightblue; }
.item-2 { background-color: lightgreen; }
.item-3 { background-color: lightyellow; } */

  /* 移动端样式 */
  @media (max-width: 768px) {

    .item-1 {
      grid-column: 1 / span 3;
      grid-row: 1 / span 1;
    }

    .item-2 {
      grid-column: 1 / span 1;
      grid-row: 2 / span 1;
    }

    .item-3 {
      grid-column: 2 / span 2;
      grid-row: 2 / span 1;
    }

    .item-contact {
      grid-row: 2 / span 1;
    }

    .item-contact-2 {
      grid-column: 2 / span 3;
      grid-row: 2 / span 1;
    }
  }
</style>
<section class="module-item {{ $design ? 'module-item-design' : ''}}" id="module-{{ $module_id }}">
  @include('design._partial._module_tool')
  <div class="container overflow-hidden">

  </div>
  <div class="module-image-402 banner-magnify-hover module-info mb-3 mb-md-5">
    <!--三列格栅布局-->
    <div class="container">
      @if ($content['title'][locale()] ?? false)
      <div class="module-title">{{ $content['title'][locale()] }}</div>
      @endif
      @if ($content['sub_title'][locale()] ?? false)
      <div class="image-402-sub-title mt-n3">{{ $content['sub_title'][locale()] }}</div>
      @endif
      <div class="module-image-info-3 d-grid grid-4">
        <div class="column text-column item-1">
          <p>
            You know what you want for your time on the mountain. .<br>
            You have the creativity and brilliant product ideas. That’s why we exist and build everything in collaboration with our customers.Our community’s feedback is the North star for the entire process – from initial sketches on a page to first tracks on a powder run. If something doesn’t get customer approval, it won’t make it on the mountain. It’s as simple as that. .<br>
            Is our gear ‘conventional’? .<br>
            Probably not. We don’t want to follow what everyone else is doing. Instead, we innovate where we can, using our community of riders as our compass.We do our best to offer a variety of patterns and colourways so you can express yourself however you want. So whether you feel at home with other snow communities or brands, or you couldn’t feel further from someone else’s notion of ‘normal’ and ‘conventional’, you’re welcome here.
          </p>
        </div>
        <div class="column image-column item-2">
          <img src="{{ asset('image/fashionimg/about1.png') }}" alt="Image 1" class="image rounded">
        </div>
        <div class="column image-column double-images item-3">
          <!-- <img src="{{ asset('image/fashionimg/about2.png') }}" alt="Image 2" class="top-image rounded">
          <img src="{{ asset('image/fashionimg/about3.png') }}" alt="Image 3" class="bottom-image rounded"> -->
          <img src="{{ asset('image/fashionimg/about2.png') }}" alt="Image 2" class="image rounded">
          <img src="{{ asset('image/fashionimg/about3.png') }}" alt="Image 3" class="image rounded">
        </div>
        <!-- <div class="grid-container">
    <div class="item item-1">
    <img src="https://img.js.design/assets/img/666476adb0b03f7960296df1.jpg#77395376185f8fa73a553f121e0ba437" alt="Image 1" class="image rounded">
    </div>
    <div class="item item-2">
    <img src="https://img.js.design/assets/img/666476b084c4114ed2f88e66.jpg#8ed290d5d543bad6ec8a9d2018264d8c" alt="Image 2" class="top-image rounded">
    <img src="https://img.js.design/assets/img/666476b3762c95b42d31fbe1.jpg#43ceb73bf5c469683fab484650770e20" alt="Image 3" class="bottom-image rounded">
      
    </div>

</div> -->
      </div>
    </div>
    <!--三列格栅布局end-->
    <!--两行两列栅格展示四个分类-->
    <div class="container" style="margin-top: 40px;">
      @if ($content['title'][locale()] ?? false)
      <div class="module-title">Explore the Line</div>
      @endif
      @if ($content['sub_title'][locale()] ?? false)
      <div class="image-402-sub-title mt-n3">Take you on a journey through the snow</div>
      @endif
      <div class="module-image-info-4 d-grid grid-4">
        <a href="/categories/100003" class="grid-item" id="item1">
          <img src="{{ asset('image/fashionimg/skis.png') }}" alt="Image 1" class="img-fluid rounded">
          <div class="overlay">
            <span class="text">Women</span>
          </div>
        </a>
        <a href="/categories/100005" class="grid-item" id="item2">
          <img src="{{ asset('image/fashionimg/boards.png') }}" alt="Image 2" class="img-fluid rounded">
          <div class="overlay">
            <span class="text">Men</span>
          </div>
        </a>
        <a href="/categories/100012" class="grid-item" id="item3">
          <img src="{{ asset('image/fashionimg/men.png') }}" alt="Image 3" class="img-fluid rounded">
          <div class="overlay">
            <span class="text">Snowboards</span>
          </div>
        </a>
        <a href="/categories/100018" class="grid-item" id="item4">
          <img src="{{ asset('image/fashionimg/women.png') }}" alt="Image 4" class="img-fluid rounded">
          <div class="overlay">
            <span class="text">Skis</span>
          </div>
        </a>
      </div>
    </div>
    <!-- 两行两列栅格展示四个分类结束 -->
    <style type="text/css">
      .module-image-info-2 .grid-2-layout {
        display: grid;
        grid-template-columns: 2fr 2fr;
        /* 第一列较宽，第二列等宽 */
        gap: 1rem;
        /* 设置列之间的间距 */
      }

      .module-image-info-2 .grid-2-layout .column {
        display: flex;
        justify-content: center;
        /* 水平居中对齐 */
        align-items: center;
        /* 垂直居中对齐 */
      }

      .module-image-info-2 .grid-2-layout .text-column {
        display: grid;
        /* 使用网格布局 */
        grid-template-rows: repeat(3, 1fr);
        /* 三行等高 */
        /* gap: 1.6rem; */
        /* 减小行之间的间距 */
        font-size: 14px;
        font-family: 'SFArabic', sans-serif;
        /* 使用 SFArabic 字体 */
      }

      .module-image-info-2 .grid-2-layout .text-column p {
        margin-bottom: 0;
        /* 移除默认的段落底部边距 */
      }

      .module-image-info-2 .grid-2-layout .text-column .info-box {
        display: flex;
        /* 使用弹性布局 */
        align-items: center;
        /* 垂直居中对齐 */
        background-color: rgba(40, 41, 49, 1);
        /* 黑色背景 */
        color: #fff;
        /* 白色文字 */
        padding: 1.5rem 1rem;
        /* 内边距 */
        border-radius: 0.25rem;
        /* 边框圆角 */
        gap: 0.5rem;
        /* 内容之间的间距 */
      }

      .module-image-info-2 .grid-2-layout .text-column .info-box .icon {
        width: 1.5rem;
        /* 图标宽度 */
        height: 1.5rem;
        /* 图标高度 */
      }

      .module-image-info-2 .grid-2-layout .text-column .info-box .title {
        font-weight: bold;
        /* 加粗标题 */
      }

      .module-image-info-2 .grid-2-layout .text-column .info-box .description {
        font-size: 0.875rem;
        /* 减小描述文字大小 */
        margin-top: 0.25rem;
        /* 添加顶部边距以与标题分开 */
      }

      .module-image-info-2 .grid-2-layout .text-column .info-box .arrow-right {
        position: absolute;
        /* 绝对定位 */
        right: 1rem;
        /* 距离右侧边缘的距离 */
        top: 50%;
        /* 垂直居中 */
        transform: translateY(-50%);
        /* 垂直居中 */
      }

      .module-image-info-2 .grid-2-layout .image-column {
        position: relative;
        /* 使图片相对于容器定位 */
      }

      .module-image-info-2 .grid-2-layout .image {
        width: 689px;
        /* 图片宽度 */
        height: 386px;
        /* 图片高度 */
        object-fit: cover;
        /* 保持图片的宽高比 */
      }

      /* 移动端适配 */
      @media (max-width: 767px) {

        /* 当屏幕宽度小于 768px 时 */
        .module-image-info-2 .grid-2-layout {
          grid-template-columns: 1fr;
          /* 单列布局 */
          grid-template-rows: auto;
          /* 动态行高 */
        }

        .module-image-info-2 .grid-2-layout .image {
          width: 100%;
          /* 图片宽度占满整个容器 */
          height: auto;
          /* 保持图片的宽高比 */
        }
      }
    </style>
    <!--底部两列展示-->
    <div class="container" style="margin-top: 40px;">
      @if ($content['title'][locale()] ?? false)
      <div class="module-title">Contact Us</div>
      @endif
      @if ($content['sub_title'][locale()] ?? false)
      <div class="image-402-sub-title mt-n3"> From help with your order to the best ski resorts to visit</div>
      @endif
      <!--如果不是移动端展示开始-->
      @if(!is_mobile())
      <div class="module-image-info-2 d-grid grid-4">
        <div class="grid-2-layout">
          <div class="column text-column">
            <p>
              You talk and we listen.
              <br>
              That’s how we live every day, and that’s what gets us up in the morning. Our customer experience team is always stoked and ready to answer to all of your questions! From help with your order to the best ski resorts to visit
            </p>
            <div class="info-box">
              <!-- <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM12 18C7.58172 18 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.4183 16.4183 18 12 18Z" fill="currentColor" />
              </svg> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
              </svg>
              <div class="title">Email</div>
              <div class="description">crew@tsykoo.com</div>
              <!-- <svg class="icon arrow-right" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L18 8L12 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg> -->
              <svg style="margin-left: 22rem;" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
              </svg>
            </div>

            <div class="info-box">
              <!-- <svg class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM12 18C7.58172 18 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.4183 16.4183 18 12 18Z" fill="currentColor" />
              </svg> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
              </svg>
              <div class="title">Messenger</div>
              <div class="description">Talk with us on messenger</div>
              <!-- <svg class="icon arrow-right" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L18 8L12 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg> -->
              <svg style="margin-left: 16rem;" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
              </svg>
            </div>
          </div>
          <div class="column image-column">
            <img src="{{ asset('image/fashionimg/Mask-group.png') }}" alt="Image 1" class="image img-fluid rounded">
          </div>
        </div>
      </div>
      @else
      <!--如果是移动端展示开始-->
      <style>
        .inbox-div {
          height: 50px;
          opacity: 1;
          border-radius: 4px;
          background: rgba(40, 41, 49, 1);
          display: flex;
          justify-content: flex-start;
          align-items: center;
          padding: 20px 40px 20px 20px;
          margin-bottom: 10px;
        }

        .inbox-div-nei {
          opacity: 1;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .inbox-div-nei-right {
          font-size: 12px;
          font-weight: 400;
          line-height: 15px;
          color: rgba(255, 255, 255, 1);
          margin-left: 10px;
        }

        .inbox-div-nei-left {
          width: 48px;
          height: 48px;
          color: rgba(255, 255, 255, 1);
          backdrop-filter: blur(5px);
          display: flex;
          /* margin-left: 160px; */
        }
        .inbox-div-nei-left-svg {
          margin-left: 150px;
        }
        .inbox-div-nei-left-svg-2 {
          margin-left: 102px;
        }
        @media screen and (max-width: 390px) {
          .inbox-div-nei-left-svg {
            margin-left: 130px;
          }
          .inbox-div-nei-left-svg-2 {
            margin-left: 81px;
          }
        }
      </style>
      <div class="module-image-info-3 d-grid grid-4">

        <div class="column image-column item-contact">
          <p>
            You talk and we listen.<br>
            That’s how we live every day, and that’s what gets us up in the morning. Our customer experience team is always stoked and ready to answer to all of your questions! From help with your order to the best ski resorts to visit.
          </p>

        </div>
        <div class="column image-column double-images item-contact-2">
          <img src="{{ asset('image/fashionimg/about3.png') }}" alt="Image 3" class="image rounded">
        </div>

      </div>
      <div class="inbox-div">
        <div class="inbox-div-nei">
          <div style="color: rgba(255, 255, 255, 1);">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"></path>
            </svg>
          </div>
          <div class="inbox-div-nei-right">
            Email<br>
            <div style="margin-left: 8px;">
              crew@tsykoo.com
            </div>

          </div>
          <div class="inbox-div-nei-left">
            <div style="margin-top: 7px;">
              <svg class="inbox-div-nei-left-svg" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="inbox-div">
        <div class="inbox-div-nei">
          <div style="color: rgba(255, 255, 255, 1);">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
              <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
              <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"></path>
            </svg>
          </div>
          <div class="inbox-div-nei-right">
            Messenger<br>
            <div style="margin-left: 8px;">
              Talk with us on messenger
            </div>

          </div>
          <div class="inbox-div-nei-left">
            <div style="margin-top: 7px;">
              <svg class="inbox-div-nei-left-svg-2" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
              </svg>
            </div>

          </div>
        </div>
      </div>
      <!--如果是移动端展示end-->
      @endif
      <!--如果是移动端展示end-->
    </div>




    <!--底部两列展示结束-->
  </div>
</section>