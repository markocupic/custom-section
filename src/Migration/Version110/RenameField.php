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

namespace Markocupic\CustomSection\Migration\Version110;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

/**
 * @internal
 */
class RenameField extends AbstractMigration
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getName(): string
    {
        return 'Custom Section 1.1.0 Update: Rename "tl_module.customSectionTpl" to "tl_module.customTpl"';
    }

    /**
     * @throws Exception
     */
    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['tl_module'])) {
            return false;
        }

        $columns = $schemaManager->listTableColumns('tl_module');

        if (!isset($columns['type']) || !isset($columns['customtpl']) || !isset($columns['customsectiontpl'])) {
            return false;
        }

        $result = $this->connection->fetchOne(
            'SELECT id FROM tl_module WHERE type = ? AND customSectionTpl != customTpl',
            [
                'custom_section',
            ],
        );

        return false !== $result;
    }

    /**
     * @throws Exception
     */
    public function run(): MigrationResult
    {
        $result = $this->connection->executeQuery(
            'SELECT * FROM tl_module WHERE type = ? AND customSectionTpl != customTpl',
            [
                'custom_section',
                '',
            ],
        );

        while (false !== ($row = $result->fetchAssociative())) {
            $set = [
                'customTpl' => $row['customSectionTpl'],
            ];

            $this->connection->update('tl_module', $set, ['id' => $row['id']]);
        }

        return $this->createResult(true);
    }
}
