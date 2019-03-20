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

        $fields->addFieldToTab('Root.Main',
            (new TextField('ElementalEmbedlyApiKey', 'Embedly API Key'))
                ->setDescription('See https://docs.embed.ly/?path=docs/apis')
        );

        return $fields;
    }
}
