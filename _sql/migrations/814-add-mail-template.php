<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

use Shopware\Components\Migrations\AbstractMigration;

class Migrations_Migration814 extends AbstractMigration
{
    /**
     * @param string $modus
     * @return void
     */
    public function up($modus)
    {
        $sql = <<<'EOD'
            INSERT IGNORE `s_core_config_mails`
                (`stateId`, `name`, `frommail`, `fromname`, `subject`, `content`, `contentHTML`, `ishtml`, `attachment`, `mailtype`, `context`, `dirty`)
            VALUE
                (NULL, 'sORDERDOCUMENTS', '{config name=mail}', '{config name=shopName}', 'Rechnung zur Bestellung {$orderNumber}', '{include file="string:{config name=emailheaderplain}"}

Hallo {$sUser.salutation|salutation} {$sUser.firstname} {$sUser.lastname},

vielen Dank für Ihre Bestellung bei {config name=shopName}. Im Anhang finden Sie Dokumente zu Ihrer Bestellung als PDF.
Wir wünschen Ihnen noch einen schönen Tag.

{include file="string:{config name=emailfooterplain}"}', '', 0, '', 2, NULL, 0);
EOD;
        $this->addSql($sql);

        $sql = <<<'EOD'
            SET @documentId = (SELECT `id` FROM `s_core_config_mails` WHERE `name` LIKE 'sORDERDOCUMENTS');
EOD;
        $this->addSql($sql);

        $sql = <<<'EOD'
            INSERT IGNORE `s_core_translations`
                (`objecttype`, `objectdata`, `objectkey`, `objectlanguage`, `dirty`)
            VALUES
                ('config_mails', 'a:4:{s:8:"fromMail";s:18:"{config name=mail}";s:8:"fromName";s:22:"{config name=shopName}";s:7:"subject";s:40:"Information to your order {$orderNumber}";s:7:"content";s:338:"{include file="string:{config name=emailheaderplain}"}

Hello {$ sUser.salutation | salutation} {$ sUser.firstname} {$ sUser.lastname},

Thank you for your order at {config name = shopName}. In the attachement you will find documents about your order as PDF.
We wish you a nice day.

{include file="string:{config name=emailfooterplain}"}";}', @documentId, '2', '1');
EOD;
        $this->addSql($sql);
    }
}
