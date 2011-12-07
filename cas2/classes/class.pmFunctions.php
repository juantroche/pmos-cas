<?php
/**
 * class.cas2.pmFunctions.php
 *
 * ProcessMaker Open Source Edition
 * Copyright (C) 2004 - 2008 Colosa Inc.
 * *
 */

////////////////////////////////////////////////////
// cas2 PM Functions
//
// Copyright (C) 2007 COLOSA
//
// License: LGPL, see LICENSE
////////////////////////////////////////////////////

function cas2_getMyCurrentDate()
{
	return G::CurDate('Y-m-d');
}

function cas2_getMyCurrentTime()
{
	return G::CurDate('H:i:s');
}
