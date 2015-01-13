<?php
namespace Mantisbt;

use Mantisbt\Client\Account;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    const MBT_TEST_URI = 'http://mantisbt.example.com';

    /**
     * @var \SoapClient
     */
    protected $soapMock;
    /**
     * @var string
     */
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
     * @expectedException \Mantisbt\Client\Exception
     * @expectedExceptionMessage Base URI is required
     */
    public function testExceptionRaisedWhenNoUriIsSet()
    {
        $client = new Client();
        $client->getUri();
    }

    public function testFallbackToDefaultWsdlLocation()
    {
        $baseUri = self::MBT_TEST_URI;
        $client = new Client($baseUri);
        $this->assertSame($baseUri . Client::MBT_SOAP_WSDL, $client->getWsdl());
    }

    public function testClientLazyLoadsNativeSoapClient()
    {
        $client = new Client(self::MBT_TEST_URI);
        $client->setWsdl($this->wsdl);
        $this->assertTrue($client->getSoapClient() instanceof \SoapClient);
    }

    public function testCanOverrideUriSettings()
    {
        $home = self::MBT_TEST_URI;
        $client = new Client();
        $client->setUri($home);
        $this->assertSame($home, $client->getUri());
    }

    public function testClientUsesNativeSoapClient()
    {
        $client = new Client();
        $client->setWsdl($this->wsdl);
        $this->assertTrue($client->getSoapClient() instanceof \SoapClient);
    }

    public function testCanSetAccountDetails()
    {
        $client = new Client();
        $client->setAccount(new Account());
        $this->assertInstanceOf('\\Mantisbt\\Client\\Account', $client->getAccount());
    }

    public function testCanVerifyInstallationVersion()
    {
        $version = '1.3.0-beta';

        $this->soapMock->expects($this->once())
            ->method('__soapCall')
            ->will($this->returnValue($version));

        $home = self::MBT_TEST_URI;
        $client = new Client($home);
        $client->setSoapClient($this->soapMock);

        $this->assertTrue($client->checkVersion($version));
    }

    public function testRetrieveIssueById()
    {
        require_once __DIR__ . '/__files/issue_fixture.php';
        $issue = getIssueData(rand(1, 9999));

        $this->soapMock->expects($this->once())
            ->method('__soapCall')
            ->will($this->returnValue($issue));

        $client = new Client(self::MBT_TEST_URI);
        $client->setAccount(new Account('test', 'test'))
            ->setSoapClient($this->soapMock);

        $result = $client->getIssue(1);

        $this->assertNotEmpty($result);
    }
}