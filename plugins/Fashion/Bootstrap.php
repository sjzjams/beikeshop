<?php

namespace Plugin\Fashion;

/*
 * 插件机制修改不了模板,只可以再默认themes/default下修改源文件
 *  
 * 
 * 
 */
class Bootstrap
{
    /**
     * https://uniapp.dcloud.net.cn/tutorial/app-payment-stripe.html
     *
     * @throws ApiErrorException
     * @throws \Exception
     */
    public function boot(): void
    {
        add_hook_blade('header.top.telephone', function ($callback, $output, $data) {
            return '电话前' . $output . '电话后';
        });

        add_hook_blade('header.top.language', function ($callback, $output, $data) {
            $view = '<div class="dropdown" style="color:red">' . $output . '</div>';
            return $view;
        });

        add_hook_blade('header.top.wrap', function ($callback, $output, $data) {
            $view = '<div class="top-wrapfashion" style="color:red">' . $output . '</div>';
            return $view;
        });
        add_hook_blade('header.top.test', function ($callback, $output, $data) {
            $view = '<div class="top-wrap" style="color:green">' . $output . '</div>';
            return $view;
        });
        
        add_hook_blade('header.top.blue', [$this, 'headerTmp'], 1);

        add_hook_blade('product.detail.name', [$this, 'modifyGoodsName'], 1);
    }

    public function headerTmp($callback, $output, $data): string
    {
        // 返回样式
        $view = '<div class="top-wrap" style="color:blue">' . $output . '</div>';
        return $view;
    }

    // 修改商品名称前缀
    public function modifyGoodsName($callback, $output, $data): string
    {
        $view = '[Fashion]' . $output;
        return $view;
    }
}