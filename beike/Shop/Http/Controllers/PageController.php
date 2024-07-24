<?php
/**
 * PageController.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-08-11 18:13:06
 * @modified   2022-08-11 18:13:06
 */

namespace Beike\Shop\Http\Controllers;

use Beike\Models\Page;
use Beike\Models\PageCategory;
use Beike\Repositories\PageCategoryRepo;
use Beike\Repositories\PageRepo;
use Beike\Shop\Http\Resources\PageDetail;
use Beike\Shop\Http\Resources\ProductSimple;

class PageController extends Controller
{
    public function show(Page $page)
    {
        $page->load(['description', 'category.description', 'products.description']);
        $page->increment('views');
        $categoryPages = PageRepo::getBuilder(['page_category_id' => $page->page_category_id])->paginate(12);

        $data = [
            'page'                   => $page,
            'active_page_categories' => PageCategoryRepo::getActiveList(),
            'page_format'            => (new PageDetail($page))->jsonSerialize(),
            'products'               => ProductSimple::collection($page->products)->jsonSerialize(),
            'category_pages'         => $categoryPages,
        ];

        $data = hook_filter('page.show.data', $data);

        return view('pages/single', $data);
    }
}
