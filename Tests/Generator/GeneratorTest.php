<?php

namespace SGK\BarcodeBundle\Tests\Generator;

use PHPUnit\Framework\TestCase;
use SGK\BarcodeBundle\Generator\Generator;

/**
 * Class GeneratorTest
 *
 * @package SGK\BarcodeBundle\Tests\Generator
 */
class GeneratorTest extends TestCase
{
    /**
     * @return array
     */
    public function getOptions()
    {
        return array(
            array(
                array(
                    'code'   => '0123456789',
                    'type'   => 'c128',
                    'format' => 'html',
                    'width'  => 2,
                    'height' => 30,
                    'color'  => 'black',
                ),
            ),
            array(
                array(
                    'code'   => '0123456789',
                    'type'   => 'c39',
                    'format' => 'svg',
                ),
            ),
            array(
                array(
                    'code'   => '0123456789',
                    'type'   => 'qrcode',
                    'format' => 'png',
                    'width'  => 5,
                    'height' => 5,
                    'color'  => array(0 ,0, 0),
                ),
            ),
        );
    }

    /**
     * testGenerate
     *
     * @param array $options
     *
     * @medium
     *
     * @dataProvider getOptions
     */
    public function testGenerate($options = array())
    {
        $generator = new Generator();

        $this->assertTrue(is_string($generator->generate($options)));
    }

    public function testGenerateNoRandom()
    {
        $generator = new Generator();

        $options = [
            'code' => '1234123412341234',
            'format' => 'png',
            'type' => 'qrcode',
        ];

        $this->assertEquals($generator->generate($options), 'iVBORw0KGgoAAAANSUhEUgAAAGkAAABpAQMAAAADTJ95AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAPdJREFUOI2tlDsSgzAMRMVQuORI3CzQ5VrMcBF8A5cUnigrgS3SRQYVDI9Cn9UiYkQKkVd5mek+csFM1AP3PhENXhx5Tcgij4rxMQwRhVrxtysahydQxsfk60WNf1Flz0h12cId5LpBDUi3kMW/iLFYA1Ma7lMT8oE8jzJv3OUb9ejQjefyVs4HygK2YRFNyYuqVUkFl7yw1VLIi9O5hSiydzAckrZjJ83FssHcoZoK4cLDGx1au1hFMPDQgmiIk10G4EeqkRPPy8DnkRHMI7zRiOorw6BWqYVcqGZ4WyGCVUL92V2oqewyqIF5I/KhWRS2nQ1T8OIXb3CHNDT2608AAAAASUVORK5CYII=');
    }

    /**
     * @return array
     */
    public function getErrorOptions()
    {
        return array(
            array(
                array(
                    'code'   => '0123456789',
                ),
            ),
            array(
                array(
                    'code'   => '0123456789',
                    'type'   => 'Unknown Type',
                    'format' => 'html',
                ),
            ),
            array(
                array(
                    'code'   => '0123456789',
                    'type'   => 'c128',
                    'format' => 'Unknown Format',
                ),
            ),
            array(
                array(
                    'code'   => '0123456789',
                    'type'   => 'c39',
                    'format' => 'svg',
                    'width'  => 'width is int',
                ),
            ),
            array(
                array(
                    'code'   => '0123456789',
                    'type'   => 'qrcode',
                    'format' => 'png',
                    'width'  => 5,
                    'height' => 5,
                    'color'  => 5,
                ),
            ),
        );
    }

    /**
     * testConfigureOptions
     *
     * @param array $options
     *
     * @medium
     *
     * @dataProvider getErrorOptions
     *
     * @expectedException \Exception
     */
    public function testConfigureOptions($options = array())
    {
        $generator = new Generator();

        $generator->generate($options);
    }
}
