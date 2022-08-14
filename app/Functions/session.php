<?php

function flashCreated(string $instanceName = '')
{
    session()->flash('success', "{$instanceName} saved successfully");
}

function flashUpdated(string $instanceName = '')
{
    session()->flash('success', "{$instanceName} updated successfully");
}

function flashDeleted(string $instanceName = '')
{
    session()->flash('success', "{$instanceName} deleted successfully");
}
