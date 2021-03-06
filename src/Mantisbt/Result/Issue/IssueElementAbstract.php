<?php
namespace Mantisbt\Result\Issue;

abstract class IssueElementAbstract implements IssueElementInterface
{
    /**
     * @var int The issue element ID from MantisBT
     */
    protected $id;
    /**
     * @var string The issue element name from MantisBT
     */
    protected $name;

    /**
     * Constructor for the issue element of an issue
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
     * @return Eta
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
     * @return Eta
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
