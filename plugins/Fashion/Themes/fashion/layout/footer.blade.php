<style>
            /* 基础样式 */
            footer._b1 {
                display: flex;
                flex-wrap: wrap;
                /* 允许在小屏幕上换行 */
                justify-content: space-between;
                /* 水平分布元素 */
                left: 0px;
                opacity: 1;
                background: rgba(40, 41, 49, 1);
                display: flex;
                height: 340px;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                padding: 40px 0px 157px 240px
            }

            /* footer._b1 第一个div */
            .b1-1div {
                /* width: auto;
                height: 143px; */
                opacity: 1;
                display: flex;
                justify-content: flex-start;
                align-items: flex-start;
            }

            .b1-2div {
                /* background-color: rgba(255, 255, 255, 1); */
            }

            .b1-2div-xiahuaxian {
                width: 1440px;
                height: 1px;
                opacity: 0.05;
                display: flex;
                margin-top: 40px;
            }

            /* footer._b1 下logo外部div */
            .b1-logo-waidiv {
                opacity: 1;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                padding: 12px 0px 12px 0px;

            }

            .b1-logo-neidiv {
                height: 24px;
                opacity: 1;
                display: flex;
            }

            .b1-div-you1 {
                width: 130px;
                /* height: 143px; */
                margin-left: 80px;
                opacity: 1;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
            }

            /* .b1-div-you2 {
                width: 130px;
                margin-left: 80px;
                opacity: 1;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
            } */

            .b1-you-title {
                opacity: 1;
                display: flex;

                /** 文本1 */
                font-size: 16px;
                font-weight: 400;
                letter-spacing: 0px;
                line-height: 38.4px;
                color: rgba(255, 255, 255, 1);
                vertical-align: middle;
            }

            .b1-you-name {
                opacity: 0.6;
                display: flex;
                /** 文本1 */
                font-size: 14px;
                font-weight: 400;
                letter-spacing: 0px;
                line-height: 24px;
                color: rgba(255, 255, 255, 1);
                vertical-align: middle;
                margin-top: 8px;
            }

            .b1-bottom {
                opacity: 1;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                margin-top: 46px;
            }

            .b1-bottom-text {
                /** 文本 */
                font-size: 14px;
                font-weight: 400;
                color: rgba(255, 255, 255, 1);
            }

            .b1-bottom-share {
                opacity: 1;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                width: 148px;
            }

            .b1-bottom-share-icon {
                eft: 3.94px;
                top: 3.94px;
                width: 28.13px;
                height: 28.13px;
                opacity: 1;

            }

            hr {
                border: none;
                border-top: 1px double rgba(255, 255, 255, 1);
                color: rgba(255, 255, 255, 1);
                overflow: visible;
                text-align: center;
                height: 1px;
            }

            /* 响应式设计h5 */
            @media (max-width: 768px) {

                /* 当屏幕宽度小于或等于 768px 时 */
                footer._b1 {
                    padding: 40px 0px 157px 7px;
                    /* 在小屏幕上占据全部宽度 */
                    height: 260px;
                }

                .b1-logo-waidiv {
                    padding: 12px 0px 12px 16px;
                }

                .b1-logo-neidiv {
                    height: 12px;
                }

                .b1-div-you1 {
                    margin-left: 20px;
                }

                .b1-2div {
                    margin-left: 16px;
                }

                /* .b1-div-you2 {
                    margin-left: 20px;
                } */

                .b1-2div-xiahuaxian {
                    margin-top: 0px;
                    width: auto;
                }

                .b1-bottom {
                    margin-top: 20px;
                    margin-left: 16px;
                }

                .b1-you-name {
                    margin-top: 0px;
                }

                .b1-bottom-text {
                    font-size: 10px;
                }
            }

            /* 响应式设计pc */
            @media (min-width: 768px) {

                /* 当屏幕宽度大于等于 576px 时 */
                footer._b1 {
                    padding: 40px 0px 157px 240px;

                }

                .b1-logo-waidiv {
                    padding: 12px 0px 12px 0px;
                }

                .b1-logo-neidiv {
                    height: 24px;
                }

                .b1-div-you1 {
                    margin-left: 80px;
                }

                .b1-2div {
                    margin-left: 0px;
                }

                /* .b1-div-you2 {
                    margin-left: 80px;
                } */

                .b1-2div-xiahuaxian {
                    margin-top: 40px;
                    width: 1440px;
                }

                .b1-bottom {
                    margin-top: 46px;
                }

                .b1-you-name {
                    margin-top: 8px;
                }

                .b1-bottom-text {
                    font-size: 14px;
                }
            }
        </style>
<footer class="_b1">
  <div>
    <div class="b1-1div">
      <div class="b1-logo-waidiv">
        <div class="b1-logo-neidiv">
          @if ($footer_content['content']['intro']['logo'] ?? false)
            <div class="logo">
              <a href="{{ shop_route('home.index') }}">
                <img src="{{ image_origin($footer_content['content']['intro']['logo']) }}" class="img-fluid">
              </a>
            </div>
          @endif
        </div>

      </div>
      @for ($i = 1; $i <= 2; $i++)
          @php
            $link = $footer_content['content']['link' . $i];
          @endphp
          <div class="b1-div-you1">
           
            <div class="b1-you-title">
            {{ $link['title'][locale()] ?? '' }}
            </div>
            
              @foreach ($link['links'] as $item)
                @if ($item['link'])
                <div class="b1-you-name">
                  <a href="{{ $item['link'] }}" style="color: rgba(255, 255, 255, 1) !important;" @if (isset($item['new_window']) && $item['new_window'])  target="_blank" @endif>
                    {{ $item['text'] }}
                  </a>
                  </div>
              @endif
              @endforeach
            
          </div>
        @endfor
    </div>

    <div class="b1-2div">
      <div class="b1-2div-xiahuaxian">
      </div>
      <hr />
    </div>
    <div class="b1-bottom">
      <div class="b1-bottom-text">
        © 2024 TSYKOO Inc. All rights reserved
      </div>
      <div class="b1-bottom-share">
        <div class="b1-bottom-share-icon">
          <a href="https://twitter.com/TSYKOO" target="_blank">
            <img src="/catalog/f.png" class="img-fluid"></a>
        </div>
        <div class="b1-bottom-share-icon">
          <a href="https://twitter.com/TSYKOO" target="_blank">
            <img src="/catalog/t.png" class="img-fluid"></a>
        </div>
        <div class="b1-bottom-share-icon">
          <a href="https://twitter.com/TSYKOO" target="_blank">
            <img src="/catalog/o.png" class="img-fluid"></a>
        </div>
      </div>
    </div>
  </div>


</footer>