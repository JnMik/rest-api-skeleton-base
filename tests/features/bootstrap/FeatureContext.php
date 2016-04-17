<?php

use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\TableNode;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Client;
use PHPUnit_Framework_Assert as Assert;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var Symfony\Component\HttpKernel\Client
     */
    private $client;

    /**
     * @var Application
     */
    private $application;

    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->initialize($parameters);

        //Create client silex
        $this->client = $this->createClient();
    }

    /**
     * @When /^I go to  "([^"]*)"$/
     */
    public function iGoTo($path)
    {
        $this->client->request("GET", $path);

        $this->response = $this->client->getResponse();
    }

    /**
     * @Then /^I should receive a (\d+) response$/
     */
    public function iShouldReceiveAResponse($responseCode)
    {
        Assert::assertEquals($responseCode, $this->response->getStatusCode());
    }

    /**
     * @Given /^I should receive following items:$/
     */
    public function iShouldReceiveFollowingItems(TableNode $table)
    {
        Assert::assertEquals(json_encode($table->getHash()[0]), $this->response->getContent());
    }

    /**
     * @return Client
     */
    private function createClient()
    {
        return new Client($this->getApplication(), array());
    }

    /**
     * @return Application
     */
    private function getApplication()
    {
        if (!$this->application) {
            $app = new Application();
            require __DIR__ . '/../../../app/app.php';

            $app['logger'] = Mockery::spy('Psr\Log\LoggerInterface');
            $app['debug'] = true;

            $this->application = $app;
        }

        return $this->application;
    }

    /**
     * @param $parameters
     */
    private function initialize($parameters)
    {
        foreach ($parameters['env'] as $key => $value) {
            putenv($key . "=" . $value);
        }

        //Create migrations
        $dbalConnection = \Api\Base\DbalConnection::create();

        $configuration = \Api\Base\MigrationConfiguration::create($dbalConnection);

        $version = $configuration->getVersion('20150611135326');
        $version->execute('up');
    }
}
