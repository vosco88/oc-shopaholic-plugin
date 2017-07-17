<?php namespace Lovata\Shopaholic\Classes\Collection;

use Lovata\Shopaholic\Classes\Store\CategoryListStore;
use Lovata\Toolbox\Classes\Collection\ElementCollection;
use Lovata\Shopaholic\Classes\Item\CategoryItem;

/**
 * Class CategoryCollection
 * @package Lovata\Shopaholic\Classes\Collection
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class CategoryCollection extends ElementCollection
{
    /** @var CategoryListStore */
    protected $obCategoryListStore;

    /**
     * CategoryCollection constructor.
     * @param CategoryListStore $obCategoryListStore
     */
    public function __construct(CategoryListStore $obCategoryListStore)
    {
        $this->obCategoryListStore = $obCategoryListStore;
    }

    /**
     * Make element item
     * @param int   $iElementID
     * @param \Lovata\Shopaholic\Models\Category  $obElement
     *
     * @return CategoryItem
     */
    protected function makeItem($iElementID, $obElement = null)
    {
        return CategoryItem::make($iElementID, $obElement);
    }

    /**
     * Set to element ID list top level category ID list
     * @return CategoryCollection
     */
    public function tree()
    {
        $this->arElementIDList = $this->obCategoryListStore->getTopLevelList();
        return $this;
    }
}