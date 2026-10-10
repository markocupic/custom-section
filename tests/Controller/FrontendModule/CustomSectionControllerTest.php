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

namespace Markocupic\CustomSection\Tests\Controller\FrontendModule;

use Markocupic\CustomSection\Controller\FrontendModule\CustomSectionController;
use PHPUnit\Framework\TestCase;

class CustomSectionControllerTest extends TestCase
{
    public function testConvertsTheKeyValueRows(): void
    {
        $data = serialize([
            ['key' => 'title', 'value' => 'Hello'],
            ['key' => 'link', 'value' => 'https://example.com'],
            ['key' => '', 'value' => 'ignored'],
            'invalid',
        ]);

        $this->assertSame(['title' => 'Hello', 'link' => 'https://example.com'], CustomSectionController::getKeyValueData($data));
    }

    public function testReturnsAnEmptyArrayForEmptyData(): void
    {
        $this->assertSame([], CustomSectionController::getKeyValueData(null));
        $this->assertSame([], CustomSectionController::getKeyValueData(''));
    }
}
