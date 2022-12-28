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
 * Frontend module category
 */
$GLOBALS['TL_LANG']['FMD']['layout'] = ['Layout modules'];

/*
 * Frontend modules
 */
$GLOBALS['TL_LANG']['FMD'][CustomSectionController::TYPE] = ['Custom section module - custom template', 'Add content to your layout using a template.'];
