<?php
function getIssueData($id)
{
    $data = new \stdClass();
    $data->id = (int) $id;
    $data->view_state = getItem('view_state');
    $data->last_updated = date('r');
    $data->project = getItem('project');
    $data->category = 'General';
    $data->priority = getItem('priority');
    $data->severity = getItem('severity');
    $data->status = getItem('status');
    $data->reporter = getMemberData();
    $data->summary = 'Summary';
    $data->reproducibility = getItem('reproducibility');
    $data->date_submitted = date('r');
    $data->sponsorship_total = (int) rand(0, 20);
    $data->handler = getMemberData();
    $data->projection = getItem('projection');
    $data->eta = getItem('eta');
    $data->resolution = getItem('resolution');
    $data->description = 'Description';
    $data->attachments = array ();
    $data->due_date = date('r');
    $data->monitors = array ();
    $data->sticky = false;
    $data->tags = array ();
    return $data;
}

function getItem($itemName)
{
    $data = new \stdClass();
    $data->id = (int) rand(1,9999);
    $data->name = 'name ' . $itemName;
    return $data;
}

function getMemberData()
{
    $id = (int) rand(1, 9999);
    $member = new \stdClass();
    $member->id = $id;
    $member->name = 'testuser' . $id;
    $member->real_name = 'Test User ' . $id;
    $member->email = 'test' . $id . '@example.com';
    return $member;
}