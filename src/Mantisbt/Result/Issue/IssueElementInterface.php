<?php
namespace Mantisbt\Result\Issue;


interface IssueElementInterface
{
    /**
     * Retrieves the issue element id
     *
     * @return int
     */
    public function getId();

    /**
     * Sets the issue element ID
     *
     * @param int $id
     * @return IssueElementInterface
     */
    public function setId($id);

    /**
     * Retrieves the issue element name
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the issue element name
     *
     * @param string $name
     * @return IssueElementInterface
     */
    public function setName($name);
}
