## Single responsibility principle

This principle of SOLID basically says that a class should have only one responsibility.

It says that when we have a class that does not meet this principle, we must divide it into more classes until this occurs.

We'll create a small class to manage our reports.

```php
<?php
class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2018-01-22';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }

    public function formatJson()
    {
        return json_encode($this->getContents());
    }
} 
```

In this example, our class has two responsibilities:

Bring in the report data.
Format the report to JSON format. So we are violating the principle of single responsibility.
To resolve this, let's do the following:
```php
<?php
class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2018-01-22';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}
```
```php
<?php
class JsonReportFormatter
{
    public function format(Report $report)
    {
        return json_encode($report->getContents());
    }
}
```

Now a new class called JsonReportFormatter has been created, exclusively responsible for formatting the report in JSON.