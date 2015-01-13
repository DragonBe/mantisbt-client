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
    $member = new \stdClass();
    $member->id = (int) rand(1, 9999);
    $member->name = 'testuser';
    $member->real_name = 'Test User';
    $member->email = 'test@example.com';
    return $member;
}