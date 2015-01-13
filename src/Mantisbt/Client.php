<?php
namespace Mantisbt;

use Mantisbt\Client\Exception as MantisbtException;
use Mantisbt\Client\Account as MantisbtAccount;
use Mantisbt\Result\Issue;

class Client
{
    const MBT_SOAP_API = '/api/soap/mantisconnect.php';
    const MBT_SOAP_WSDL = '/api/soap/mantisconnect.php?wsdl';
    const MBT_MIN_VERSION = '1.2.0';

    /**
     * @var string The full URI of the installed MantisBT bugtracker
     * @example http://www.mantisbt.org/bugs
     */
    protected $uri;

    /**
     * @var \SoapClient The SOAP client
     */
    protected $soapClient;

    /**
     * @var string The location of the WSDL SOAP Service description
     */
    protected $wsdl;

    /**
     * @var \Mantisbt\Client\Account
     */
    protected $account;

    /**
     * @param null|string $uri The full URI of the installed MantisBT bugtracker
     */
    function __construct($uri = null)
    {
        if (null !== $uri) {
            $this->setUri($uri);
        }
    }

    /**
     * @return string
     * @throw MantisbtException
     */
    public function getUri()
    {
        if (null === $this->uri) {
            throw new MantisbtException('Base URI is required');
        }
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return Client
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return string
     */
    public function getWsdl()
    {
        if (null === $this->wsdl) {
            $this->setWsdl($this->getUri() . self::MBT_SOAP_WSDL);
        }
        return $this->wsdl;
    }

    /**
     * @param string $wsdl
     * @return Client
     */
    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;
        return $this;
    }

    /**
     * @return \SoapClient
     */
    public function getSoapClient()
    {
        if (null === $this->soapClient) {
            $soapClient = new \SoapClient($this->getWsdl(), []);
            $this->soapClient = $soapClient;
        }
        return $this->soapClient;
    }

    /**
     * @param \SoapClient $soapClient
     * @return Client
     */
    public function setSoapClient(\SoapClient $soapClient)
    {
        $this->soapClient = $soapClient;
        return $this;
    }

    /**
     * @return MantisbtAccount
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param MantisbtAccount $account
     * @return Client
     */
    public function setAccount(MantisbtAccount $account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * Checks the minimum version of MantisBT Tracker
     *
     * @param string $version
     * @return bool
     * @throws \SoapFault
     */
    public function checkVersion($version = self::MBT_MIN_VERSION)
    {
        $serverVersion = $this->getSoapClient()->__soapCall('mc_version', []);
        $result = version_compare($serverVersion, $version, '>=');
        return $result;
    }

    /**
     * Retrieves the issue from MantisBT Tracker providing an ID
     *
     * @param $issueId
     * @return Issue
     */
    public function getIssue($issueId)
    {
        $result = $this->getSoapClient()->__soapCall('mc_issue_get', [
            'username' => $this->getAccount()->getUsername(),
            'password' => $this->getAccount()->getPassword(),
            'issue_id' => $issueId,
        ]);
//        return new Issue($result);
        return $result;
    }
}