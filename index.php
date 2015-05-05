<?php

include('vendor/autoload.php');
 
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Formatter\LineFormatter;

// create a log channel
$log = new Logger('app');

$log->pushHandler(new StreamHandler(
    'logs/app.log', Logger::INFO
));

$log->addWarning('Error warning');
$log->addCritical('critical :(');



$syslogHandler = new SyslogHandler(
    'app', 'localhost', Logger::INFO
);


$formatter = new LineFormatter("%datetime% - %channel% - %level_name% - %message%\n");
$syslogHandler->setFormatter($formatter);
$log->pushHandler($syslogHandler);
$log->addDebug('debug message');
$log->addInfo('info message');
$log->addWarning('warning message');
$log->addError('error message');
$log->addCritical('critical message');