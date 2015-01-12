<?php
namespace Mantisbt;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    protected $soapMock;
    protected $wsdl;

    protected function setUp()
    {
        parent::setUp();
        $this->wsdl = __DIR__ . '/__files/mantisbt.wsdl';
        $this->soapMock = $this->getMock('\\SoapClient', array ('__soapCall'), array ($this->wsdl));
    }

    protected function tearDown()
    {
        $this->soapMock = null;
        $this->wsdl = null;
        parent::tearDown();
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage Base URI is required
     */
    public function testExceptionRaisedWhenNoUriIsSet()
    {
        $client = new Client();
        $client->getUri();
    }

    public function testFallbackToDefaultWsdlLocation()
    {
        $baseUri = 'http://mantisbt.example.org';
        $client = new Client($baseUri);
        $this->assertSame($baseUri . Client::MBT_SOAP_WSDL, $client->getWsdl());
    }

    public function testClientLazyLoadsNativeSoapClient()
    {
        $client = new Client('http://mantisbt.example.com');
        $client->setWsdl($this->wsdl);
        $this->assertTrue($client->getSoapClient() instanceof \SoapClient);
    }

    public function testClientUsesNativeSoapClient()
    {
        $home = 'http://mantisbt.example.com';
        $client = new Client($home);
//        $this->assertTrue($client->getSoapClient() instanceof \SoapClient);
        $this->assertSame($home, $client->getUri());
    }

    public function testCanVerifyInstallationVersion()
    {
        $version = '1.3.0-beta';

        $this->soapMock->expects($this->once())
            ->method('__soapCall')
            ->will($this->returnValue($version));

        $home = 'http://www.mantisbt.org/bugs';
        $client = new Client($home);
        $client->setSoapClient($this->soapMock);

        $this->assertTrue($client->checkVersion($version));
    }
}