<?php

namespace MeilleursBiens\Calendly;

use MeilleursBiens\Calendly\Api\Client;
use MeilleursBiens\Calendly\Api\EventTypes;
use MeilleursBiens\Calendly\Api\Memberships;
use MeilleursBiens\Calendly\Api\ScheduledEvents;
use MeilleursBiens\Calendly\Api\Users;
use MeilleursBiens\Calendly\Api\Webhooks;

/**
 * Class CalendlyAPI
 *
 * @package MeilleursBiens\Calendly
 */
class CalendlyAPI
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var \MeilleursBiens\Calendly\Api\Client
     */
    protected $client;

    /**
     * CalendlyAPI constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->client = new Client($config);
    }

    /**
     * @return \MeilleursBiens\Calendly\Api\Client
     */
    public function client()
    {
        return $this->client;
    }

    /**
     * @param $personalToken
     * @param $organizationUri
     * @return \MeilleursBiens\Calendly\CalendlyAPI
     */
    public function changeCredentials($personalToken, $organizationUri)
    {
        $config = [
            'personal_token' => $personalToken,
            'organization_uri' => $organizationUri,
        ];

        $this->config = $config;
        $this->client = new Client($config);

        return $this;
    }

    /**
     * @return \MeilleursBiens\Calendly\Api\Users
     */
    public function users()
    {
        return new Users($this->client);
    }

    /**
     * @return \MeilleursBiens\Calendly\Api\EventTypes
     */
    public function eventTypes()
    {
        return new EventTypes($this->client);
    }

    /**
     * @return \MeilleursBiens\Calendly\Api\ScheduledEvents
     */
    public function scheduledEvents()
    {
        return new ScheduledEvents($this->client);
    }

    /**
     * @return \MeilleursBiens\Calendly\Api\Memberships
     */
    public function memberships()
    {
        return new Memberships($this->client);
    }

    /**
     * @return \MeilleursBiens\Calendly\Api\Webhooks
     */
    public function webhooks($organizationUri = null)
    {
        if (is_null($organizationUri)) {
            $organizationUri = $this->config['organization_uri'];
        }

        return new Webhooks($this->client, $organizationUri);
    }
}
