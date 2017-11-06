<?php
namespace tests\Framework\Twig;

use Framework\Twig\TextExtension;
use PHPUnit\Framework\TestCase;

class TextExtensionTest extends TestCase
{
    /**
     * @var TextExtension
     */
    private $textExtension;

    protected function setUp()
    {
        $this->textExtension = new  TextExtension();
    }

    public function testExcerptWithShortText()
    {
        $text = "Salut";
        $this->assertEquals($text, $this->textExtension->excerpt($text, 10));
    }

    public function testExcerptWithLongText()
    {
        $text = "Salut les gens";
        $this->assertEquals('Salut l...', $this->textExtension->excerpt($text, 7));
        $this->assertEquals('Salut les ge...', $this->textExtension->excerpt($text, 12));
    }
}