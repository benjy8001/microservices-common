<?php

namespace Microservices;

use Illuminate\Support\Collection;

class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $is_influencer;

    /**
     * User constructor.
     * @param array $json
     */
    public function __construct(array $json)
    {
        $this->id = $json['id'];
        $this->first_name = $json['first_name'];
        $this->last_name = $json['last_name'];
        $this->email = $json['email'];
        $this->is_influencer = $json['is_influencer'] ?? 0;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return 0 === $this->is_influencer;
    }

    /**
     * @return bool
     */
    public function isInfluencer(): bool
    {
        return 1 === $this->is_influencer;
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }
}
