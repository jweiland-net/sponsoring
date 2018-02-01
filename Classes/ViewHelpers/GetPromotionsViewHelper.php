<?php
namespace JWeiland\Sponsoring\ViewHelpers;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get a sorting array
 */
class GetPromotionsViewHelper extends AbstractViewHelper {

    /**
     * @var \JWeiland\Sponsoring\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var \JWeiland\Sponsoring\Configuration\ExtConf;
     */
    protected $extConf;

    /**
     * inject category repository
     *
     * @param \JWeiland\Sponsoring\Domain\Repository\CategoryRepository $categoryRepository
     * @return void
     */
    public function injectCategoryRepository(\JWeiland\Sponsoring\Domain\Repository\CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * inject extension configuration
     *
     * @param \JWeiland\Sponsoring\Configuration\ExtConf $extConf
     * @return void
     */
    public function injectExtConf(\JWeiland\Sponsoring\Configuration\ExtConf $extConf)
    {
        $this->extConf = $extConf;
    }

    /**
     * get direct child categories of defined root category in extConf
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
