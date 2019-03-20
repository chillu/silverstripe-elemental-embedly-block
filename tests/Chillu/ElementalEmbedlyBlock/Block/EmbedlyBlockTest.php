<?php
namespace Chillu\ElementalEmbedlyBlock\Tests\Block;

use Chillu\ElementalEmbedlyBlock\Block\EmbedlyBlock;
use SilverStripe\Dev\SapphireTest;

class EmbedlyBlockTest extends SapphireTest
{
    public function testWidthAcceptsPercent()
    {
        $block = new EmbedlyBlock([
            'Width' => '100%'
        ]);
        $this->assertEquals('100%', $block->getWidthAttribute());
    }

    public function testWidthAcceptsPx()
    {
        $block = new EmbedlyBlock([
            'Width' => '100px'
        ]);
        $this->assertEquals('100px', $block->getWidthAttribute());
    }

    public function testWidthSanitisesInvalidValues()
    {
        $block = new EmbedlyBlock([
            'Width' => 'invalid'
        ]);
        $this->assertEquals('', $block->getWidthAttribute());
    }
}
