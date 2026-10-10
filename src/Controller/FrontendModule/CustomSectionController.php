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
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(type: CustomSectionController::TYPE, category: 'layout', template: 'mod_custom_section')]
class CustomSectionController extends AbstractFrontendModuleController
{
    public const TYPE = 'custom_section';

    /**
     * Converts the serialized key-value rows of the "data" field into an associative array.
     */
    public static function getKeyValueData(mixed $data): array
    {
        $arrData = [];

        foreach (StringUtil::deserialize($data, true) as $row) {
            if (!\is_array($row) || !isset($row['key']) || '' === (string) $row['key']) {
                continue;
            }

            $arrData[(string) $row['key']] = $row['value'] ?? '';
        }

        return $arrData;
    }

    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        $template->set('data', self::getKeyValueData($model->data));

        return $template->getResponse();
    }
}
