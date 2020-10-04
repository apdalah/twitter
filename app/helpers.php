<?php

/**
 * current_user [helper method to get the authenticated user]
 * 
 * @return object [authenticated user]
 */
function current_user()
{
    return auth()->user();
}