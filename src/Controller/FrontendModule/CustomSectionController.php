<?php

declare(strict_types=1);

/*
 * This file is part of Custom Section.
 *
 * (c) Marko Cupic 2022 <m.cupic@gmx.ch>
 * @license MIT
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/custom-section
 */

namespace Markocupic\CustomSection\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\ModuleModel;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(type: CustomSectionController::TYPE, category: 'layout', template: 'mod_custom_section')]
class CustomSectionController extends AbstractFrontendModuleController
{
    public const TYPE = 'custom_section';

    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {
        $this->initializeContaoFramework();

        $arrData = [];

        foreach (StringUtil::deserialize($model->data, true) as $arrKeyValue) {
            $arrData[$arrKeyValue['key']] = $arrKeyValue['value'];
        }

        $template->data = $arrData;

        return $template->getResponse();
    }
}
