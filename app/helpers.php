<?php

function dateFormat($date)
{
  return \Carbon\Carbon::parse($date)->isoFormat('D. MM. YYYY');
}

function ageInMonths($date)
{
  return \Carbon\Carbon::parse()->DiffInMonths($date);
}
