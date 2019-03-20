<?php

namespace Chillu\ElementalEmbedlyBlock\Block;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

class EmbedlyBlock extends BaseElement
{
    private static $icon = 'font-icon-block-media';

    private static $db = [
        'EmbedURL' => 'Text',
        'Width' => 'Varchar',
        'Align' => 'Enum(array("left","right","center"), "left")',
    ];

    private static $singular_name = 'Embed.ly';

    private static $plural_name = 'Embed.ly';

    private static $table_name = 'EmbedlyBlock';

    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Embed.ly');
    }

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->dataFieldByName('EmbedURL')->setRows(1);

            $fields->dataFieldByName('Width')
                ->setTitle('Maximum width')
                ->setDescription('Example: 500px, 100%. Cards are responsive by default.');
        });

        return parent::getCMSFields();
    }

    /**
     * Return content summary for summary section of ElementEditor
     *
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->EmbedURL;
        return $blockSchema;
    }

    /**
     * @return string
     */
    public function getWidthAttribute()
    {
        if (!$this->Width) {
            return '';
        }

        if (is_numeric($this->Width)) {
            return "{$this->Width}px";
        }

        // Sanitisation
        if (!preg_match('/[0-9](\%|px)/', $this->Width)) {
            return '';
        }

        return $this->Width;
    }

    public function getApiKey()
    {
        return SiteConfig::get()->First()->ElementalEmbedlyApiKey;
    }

}
