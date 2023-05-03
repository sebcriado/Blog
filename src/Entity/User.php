<?php

// 1. Déclaration du namespace
namespace App\Entity;

use DateTimeImmutable;

// 2. Imports de classe

// 3. Déclaration de la classe User
class User
{

    // Propriétés
    private int $id;
    private string $nickname;
    private string $email;
    private string $password;
    private DateTimeImmutable $createdAt;

    // Constructeur
    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nickname
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     */
    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt(string|DateTimeImmutable $createdAt): self
    {
        if (is_string($createdAt)) { // '2016-12-26'
            $createdAt = new DateTimeImmutable($createdAt);
        }

        $this->createdAt = $createdAt;

        return $this;
    }
}
