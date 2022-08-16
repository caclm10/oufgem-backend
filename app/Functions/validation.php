<?php

use Illuminate\Support\MessageBag;

function customValidate(array $messages)
{
    $messageBag = new MessageBag($messages);

    return back()->withErrors($messageBag)->withInput();
}
