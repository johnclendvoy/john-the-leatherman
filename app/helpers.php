<?php

/*
* Show the style that a tab is selected based on the url
*/
function setActive($tab_name)
{
	if(Request::segment(1) == $tab_name)
	{
		return 'active';
	}
	else{
		return '';
	}
}

function active($val1, $val2)
{
	if($val1 == $val2)
	{
		return 'active';
	}
}

/**
* Boolean to Yes\No string
*/
function b2yn($bool)
{
	if($bool == 0 || $bool == '0')
	{
		return 'No';
	}
	else if($bool == 1 || $bool == '1')
	{
		return 'Yes';
	}
	else
	{
		return $bool;
	}
}

/**
 * Return a Carbon object if a date was entered, return null otherwise
 *
 * @param string  $date
 */
function setCarbonOrNull($date)
{
    if(!empty($date))
    {
        return new Carbon($date);
    }
    else
    {
        return null;
    }
}

/**
 * Return an integer if a date was entered, return null otherwise
 *
 * @param string  $date
 */
function setIntOrNull($value)
{
    if(!empty($value))
    {
        return $value;
    }
    else
    {
        return null;
    }
}