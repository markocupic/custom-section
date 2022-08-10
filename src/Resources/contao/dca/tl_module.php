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

use Markocupic\CustomSection\Controller\FrontendModule\CustomSectionController;

/*
 * Add a palette to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes'][CustomSectionController::TYPE] = '{title_legend},name,headline,type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';
