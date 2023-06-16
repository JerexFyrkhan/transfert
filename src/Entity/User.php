<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $nom = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\OneToMany(mappedBy: 'proprietaire', targetEntity: Object756::class)]
    private Collection $objects756;

    public function __construct()
    {
        $this->objects756 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->nom;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Object756>
     */
    public function getObjects756(): Collection
    {
        return $this->objects756;
    }

    public function addObjects756(Object756 $objects756): static
    {
        if (!$this->objects756->contains($objects756)) {
            $this->objects756->add($objects756);
            $objects756->setProprietaire($this);
        }

        return $this;
    }

    public function removeObjects756(Object756 $objects756): static
    {
        if ($this->objects756->removeElement($objects756)) {
            // set the owning side to null (unless already changed)
            if ($objects756->getProprietaire() === $this) {
                $objects756->setProprietaire(null);
            }
        }

        return $this;
    }
}
