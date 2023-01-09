<?php

namespace MeilleursBiens\Calendly\Api;

/**
 * Class Users
 * @package MeilleursBiens\Calendly\Api
 */
class Users extends Resource
{
    /**
     * @var string
     */
    protected $endPoint = '/users/';

    public function me()
    {
        return $this->get('me');
    }
}
