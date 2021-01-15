<?php

namespace NeutronStars\Authentification;

class User
{
    public static function init(string $sessionKey, array $requiredKeys, int $timeout = 86400): self
    {
        session_start();
        $user = new self($sessionKey, $requiredKeys, $timeout);
        $user->load();
        return $user;
    }

    private array $requiredKeys;
    private string $sessionKey;
    private int $timeout;

    private array $data;

    private function __construct(string $sessionKey, array $requiredKeys, int $timeout)
    {
        $this->requiredKeys = $requiredKeys;
        $this->sessionKey = $sessionKey;
        $this->timeout = $timeout;
    }

    private function load(): void
    {
        if(!empty($_SESSION[$this->sessionKey])) {
            $this->data = $_SESSION[$this->sessionKey];
            if(!isset($this->data['auth_timeout']) || time()-$this->data['auth_timeout'] >= $this->timeout) {
                $this->disconnect();
                return;
            }
            foreach($this->requiredKeys as $key) {
                if(!isset($this->data[$key])){
                    $this->disconnect();
                    return;
                }
            }
            $this->data['auth_timeout'] = time();
            $_SESSION[$this->sessionKey]['auth_timeout'] = $this->data['auth_timeout'];
            return;
        }
        $this->disconnect();
    }

    public function get(string $key, $def = null)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $def;
    }

    public function set(string $key, $value): void
    {
        if($this->isConnected())
        {
            $this->data[$key] = $value;
            $_SESSION[$this->sessionKey][$key] = $value;
        }
    }

    public function connect(array $data): void
    {
        $this->data = $data;
        $this->data['auth_timeout'] = time();
        $_SESSION[$this->sessionKey] = $this->data;
    }

    public function disconnect(bool $force = false): void
    {
        $this->data = [];
        if(isset($_SESSION[$this->sessionKey]))
        {
            $_SESSION[$this->sessionKey] = [];
            if($force){
                $_SESSION = [];
                session_destroy();
            }
        }
    }

    public function isConnected(): bool
    {
        return !empty($this->data);
    }
}
