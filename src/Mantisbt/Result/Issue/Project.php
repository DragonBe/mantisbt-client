<?php
namespace Mantisbt\Result\Issue;

class Project
{
    /**
     * @var int The project ID from MantisBT
     */
    protected $id;
    /**
     * @var string The project name from MantisBT
     */
    protected $name;

    /**
     * Constructor for the project of an issue
     *
     * @param null|\stdClass|int $id
     * @param null|string $name
     */
    function __construct($id = null, $name = null)
    {
        if (null !== $id) {
            if ($id instanceof \stdClass) {
                $this->setId($id->id)
                    ->setName($id->name);
            } else {
                $this->setId($id);
            }
        }
        if (null !== $name) {
            $this->setName($name);
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return State
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return State
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}