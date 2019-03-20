<?php
namespace Chillu\ElementalEmbedlyBlock\Extension;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class EmbedlySiteConfigExtension extends DataExtension
{
    private static $db = [
        'ElementalEmbedlyApiKey' => 'Varchar(100)'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        parent::updateCMSFields($fields);

        $apiField = (new TextField('ElementalEmbedlyApiKey', 'Embedly API Key'))
            ->setDescription('See https://docs.embed.ly/?path=docs/apis');
        $fields->addFieldToTab('Root.Main', $apiField);

        return $fields;
    }
}
