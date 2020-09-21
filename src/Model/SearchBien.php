<?php
namespace App\Model;

class SearchBien
{
    private $type;

    private $budget;

    private $localisation;

    private $rooms;

    private $livingSpace;

    private $landSpace;

    private $message;

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setType(string $type): SearchBien
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getBudget(): ?string
    {
        return $this->budget;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setBudget(string $budget): SearchBien
    {
        $this->budget = $budget;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setLocalisation(string $localisation): SearchBien
    {
        $this->localisation = $localisation;
        return $this;
    }

    /**
     * @return string
     */
    public function getRooms(): ?string
    {
        return $this->rooms;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setRooms(string $rooms): SearchBien
    {
        $this->rooms = $rooms;
        return $this;
    }

    /**
     * @return string
     */
    public function getLivingSpace(): ?string
    {
        return $this->livingSpace;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setLivingSpace(string $livingSpace): SearchBien
    {
        $this->livingSpace = $livingSpace;
        return $this;
    }

    /**
     * @return string
     */
    public function getLandSpace(): ?string
    {
        return $this->landSpace;
    }

    /**
     * @param string
     * @return SearchBien
     */
    public function setLandSpace(string $landSpace): SearchBien
    {
        $this->landSpace = $landSpace;
        return $this;
    }

}