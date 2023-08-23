<?php

class JsonReportFormatter
{
    public function format(Report $report)
    {
        return json_encode($report->getContents());
    }
}