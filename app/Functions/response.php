<?php

function resourceNotFound(string $name)
{
    return response()->json(['message' => "{$name} not found."], 404);
}

function badRequest()
{
    return response()->json(status: 400);
}
