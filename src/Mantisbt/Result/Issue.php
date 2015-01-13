<?php
namespace Mantisbt\Result;

use \Mantisbt\Result\Issue\Eta;
use \Mantisbt\Result\Issue\Priority;
use \Mantisbt\Result\Issue\Project;
use \Mantisbt\Result\Issue\Projection;
use \Mantisbt\Result\Issue\Reproducibility;
use \Mantisbt\Result\Issue\Resolution;
use \Mantisbt\Result\Issue\Severity;
use \Mantisbt\Result\Issue\State;
use \Mantisbt\Result\Issue\Status;
use \Mantisbt\Result\Member;

class Issue
{
    /**
     * @var int The issue ID from MantisBT
     */
    protected $issueId;

    /**
     * @var State
     */
    protected $issueState;

    /**
     * @var \DateTime
     */
    protected $lastUpdated;

    /**
     * @var Project
     */
    protected $project;

    /**
     * @var string
     */
    protected $category;

    /**
     * @var Priority
     */
    protected $priority;

    /**
     * @var Severity
     */
    protected $severity;

    /**
     * @var Status
     */
    protected $status;

    /**
     * @var Member
     */
    protected $reporter;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var Reproducibility
     */
    protected $reproducibility;

    /**
     * @var \DateTime
     */
    protected $dateSubmitted;

    /**
     * @var int
     */
    protected $sponsorshipTotal;

    /**
     * @var Member
     */
    protected $handler;

    /**
     * @var Projection
     */
    protected $projection;

    /**
     * @var Eta
     */
    protected $eta;

    /**
     * @var Resolution
     */
    protected $resolution;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $attachments;

    /**
     * @var \DateTime
     */
    protected $dueDate;

    /**
     * @var array
     */
    protected $monitors;

    /**
     * @var bool
     */
    protected $sticky;

    /**
     * @var array
     */
    protected $tags;

    public function __construct($data = null)
    {
        if (null !== $data) {
            $this->populate($data);
        }
    }

    /**
     * @return int
     */
    public function getIssueId()
    {
        return $this->issueId;
    }

    /**
     * @param int $issueId
     * @return Issue
     */
    public function setIssueId($issueId)
    {
        $this->issueId = $issueId;
        return $this;
    }

    /**
     * @return State
     */
    public function getIssueState()
    {
        return $this->issueState;
    }

    /**
     * @param State $issueState
     * @return Issue
     */
    public function setIssueState($issueState)
    {
        $this->issueState = $issueState;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTime $lastUpdated
     * @return Issue
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return Issue
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Issue
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param Priority $priority
     * @return Issue
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return Severity
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * @param Severity $severity
     * @return Issue
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;
        return $this;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     * @return Issue
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Member
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * @param Member $reporter
     * @return Issue
     */
    public function setReporter($reporter)
    {
        $this->reporter = $reporter;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Issue
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return Reproducibility
     */
    public function getReproducibility()
    {
        return $this->reproducibility;
    }

    /**
     * @param Reproducibility $reproducibility
     * @return Issue
     */
    public function setReproducibility($reproducibility)
    {
        $this->reproducibility = $reproducibility;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateSubmitted()
    {
        return $this->dateSubmitted;
    }

    /**
     * @param \DateTime $dateSubmitted
     * @return Issue
     */
    public function setDateSubmitted($dateSubmitted)
    {
        $this->dateSubmitted = $dateSubmitted;
        return $this;
    }

    /**
     * @return int
     */
    public function getSponsorshipTotal()
    {
        return $this->sponsorshipTotal;
    }

    /**
     * @param int $sponsorshipTotal
     * @return Issue
     */
    public function setSponsorshipTotal($sponsorshipTotal)
    {
        $this->sponsorshipTotal = $sponsorshipTotal;
        return $this;
    }

    /**
     * @return Member
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param Member $handler
     * @return Issue
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     * @return Projection
     */
    public function getProjection()
    {
        return $this->projection;
    }

    /**
     * @param Projection $projection
     * @return Issue
     */
    public function setProjection($projection)
    {
        $this->projection = $projection;
        return $this;
    }

    /**
     * @return Eta
     */
    public function getEta()
    {
        return $this->eta;
    }

    /**
     * @param Eta $eta
     * @return Issue
     */
    public function setEta($eta)
    {
        $this->eta = $eta;
        return $this;
    }

    /**
     * @return Resolution
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * @param Resolution $resolution
     * @return Issue
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Issue
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param array $attachments
     * @return Issue
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $dueDate
     * @return Issue
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return array
     */
    public function getMonitors()
    {
        return $this->monitors;
    }

    /**
     * @param array $monitors
     * @return Issue
     */
    public function setMonitors($monitors)
    {
        $this->monitors = $monitors;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSticky()
    {
        return $this->sticky;
    }

    /**
     * @param boolean $sticky
     * @return Issue
     */
    public function setSticky($sticky)
    {
        $this->sticky = $sticky;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return Issue
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    protected function populate(\StdClass $data)
    {
        $this->setIssueId($data->id)
            ->setIssueState($data->view_state)
            ->setLastUpdated(new \DateTime($data->last_updated))
            ->setProject(new Project($data->project))
            ->setCategory($data->category)
            ->setPriority(new Priority($data->priority))
            ->setSeverity(new Severity($data->severity))
            ->setStatus(new Status($data->status))
            ->setReporter(new Member($data->reporter))
            ->setSummary($data->summary)
            ->setReproducibility(new Reproducibility($data->reproducibility))
            ->setDateSubmitted(new \DateTime($data->date_submitted))
            ->setSponsorshipTotal($data->sponsorship_total)
            ->setHandler(new Member($data->handler))
            ->setProjection(new Projection($data->projection))
            ->setEta(new Eta($data->eta))
            ->setResolution(new Resolution($data->resolution))
            ->setDescription($data->description)
            ->setAttachments($data->attachments)
            ->setDueDate(new \DateTime($data->due_date))
            ->setMonitors($data->monitors)
            ->setSticky($data->sticky)
            ->setTags($data->tags);
    }
}