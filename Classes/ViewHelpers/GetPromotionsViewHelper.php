<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\ViewHelpers;

use JWeiland\Sponsoring\Configuration\ExtConf;
use TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get direct child categories of defined root category in ExtConf
 *
 * @deprecated Will be removed with sponsoring 4.0.0 as repos have nothing to do in VHs.
 */
class GetPromotionsViewHelper extends AbstractViewHelper
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ExtConf;
     */
    protected $extConf;

    public function __construct(CategoryRepository $categoryRepository, ExtConf $extConf)
    {
        $this->categoryRepository = $categoryRepository;
        $this->extConf = $extConf;
    }

    /**
     * Get direct child categories of defined root category in extConf
     */
    public function render(): array
    {
        // make sure to have only categories which are direct children of rootCategory

        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $categoryResult */
        $categoryResult = $this->categoryRepository->findByParent(
            $this->extConf->getRootCategory()
        );

        // We need an array as collection for usort and not an ObjectStorage
        return $categoryResult->toArray();
    }
}
