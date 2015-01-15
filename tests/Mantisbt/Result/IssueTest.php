<?php
namespace Mantisbt\Result;


class IssueTest extends \PHPUnit_Framework_TestCase
{
    public function testFillingIssueObjectWithData()
    {
        $data = $this->getMockData();
        $issue = new Issue($data);

        $this->assertSame($data->id, $issue->getIssueId());
        $this->assertSame($data->view_state, $issue->getIssueState());
        $this->assertSame($data->last_updated, $issue->getLastUpdated()->format('r'));
        $this->assertSame($data->project->id, $issue->getProject()->getId());
        $this->assertSame($data->project->name, $issue->getProject()->getName());
        $this->assertSame($data->category, $issue->getCategory());
        $this->assertSame($data->priority->id, $issue->getPriority()->getId());
        $this->assertSame($data->priority->name, $issue->getPriority()->getName());
        $this->assertSame($data->severity->id, $issue->getSeverity()->getId());
        $this->assertSame($data->severity->name, $issue->getSeverity()->getName());
        $this->assertSame($data->status->id, $issue->getStatus()->getId());
        $this->assertSame($data->status->name, $issue->getStatus()->getName());
        $this->assertSame($data->reporter->id, $issue->getReporter()->getMemberId());
        $this->assertSame($data->reporter->name, $issue->getReporter()->getName());
        $this->assertSame($data->reporter->real_name, $issue->getReporter()->getRealName());
        $this->assertSame($data->reporter->email, $issue->getReporter()->getEmail());
        $this->assertSame($data->summary, $issue->getSummary());
        $this->assertSame($data->reproducibility->id, $issue->getReproducibility()->getId());
        $this->assertSame($data->reproducibility->name, $issue->getReproducibility()->getName());
        $this->assertSame($data->date_submitted, $issue->getDateSubmitted()->format('r'));
        $this->assertSame($data->sponsorship_total, $issue->getSponsorshipTotal());
        $this->assertSame($data->handler->id, $issue->getHandler()->getMemberId());
        $this->assertSame($data->handler->name, $issue->getHandler()->getName());
        $this->assertSame($data->handler->real_name, $issue->getHandler()->getRealName());
        $this->assertSame($data->handler->email, $issue->getHandler()->getEmail());
        $this->assertSame($data->projection->id, $issue->getProjection()->getId());
        $this->assertSame($data->projection->name, $issue->getProjection()->getName());
        $this->assertsame($data->eta->id, $issue->getEta()->getId());
        $this->assertSame($data->eta->name, $issue->getEta()->getName());
        $this->assertSame($data->resolution->id, $issue->getResolution()->getId());
        $this->assertSame($data->resolution->name, $issue->getResolution()->getName());
        $this->assertSame($data->description, $issue->getDescription());
        $this->assertSame($data->attachments, $issue->getAttachments());
        $this->assertSame($data->due_date, $issue->getDueDate()->format('r'));
        $this->assertSame($data->monitors, $issue->getMonitors());
        $this->assertsame($data->sticky, $issue->isSticky());
        $this->assertSame($data->tags, $issue->getTags());

    }

    protected function getMockData()
    {
        require_once __DIR__ . '/../__files/issue_fixture.php';
        return getIssueData(rand(1,9999));
    }
}