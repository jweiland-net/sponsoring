<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get direct child categories of defined root category in ExtConf
 */
class GetPromotionsViewHelper extends AbstractViewHelper
{
    /**
     * @var \JWeiland\Sponsoring\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var \JWeiland\Sponsoring\Configuration\ExtConf;
     */
    protected $extConf;

    /**
     * @param \JWeiland\Sponsoring\Domain\Repository\CategoryRepository $categoryRepository
     */
    public function injectCategoryRepository(\JWeiland\Sponsoring\Domain\Repository\CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param \JWeiland\Sponsoring\Configuration\ExtConf $extConf
     */
    public function injectExtConf(\JWeiland\Sponsoring\Configuration\ExtConf $extConf)
    {
        $this->extConf = $extConf;
    }

    /**
     * Get direct child categories of defined root category in extConf
     *
     * @return array
     */
    public function render(): array
    {
        $rootCategory = (int)$this->extConf->getRootCategory();
        // make sure to have only categories which are direct children of rootCategory
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $categoryResult */
        $categoryResult = $this->categoryRepository->findByParent($rootCategory);
        // we need an Array as collection for usort and not an ObjectStorage
        $categories = $categoryResult->toArray();

        return $categories;
    }
}
