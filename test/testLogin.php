<?php

require_once '../vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

$host = 'http://localhost:9515';
$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

$testCases = [
    [
        'email' => 'admin@test.com',
        'password' => 'wrongpassword',
        'expected' => 'failure',
        'description' => 'Wrong password'
    ],
    [
        'email' => 'invalid@gmail.com',
        'password' => 'Admin@123',
        'expected' => 'failure',
        'description' => 'Invalid email'
    ],
    [
        'email' => '',
        'password' => '',
        'expected' => 'failure',
        'description' => 'Empty fields'
    ],
    [
        'email' => 'admin',
        'password' => 'Admin@123',
        'expected' => 'failure',
        'description' => 'Invalid Email Format'
    ],
    [
        'email' => "<script>alert('xss')</script>",
        'password' => 'test',
        'expected' => 'failure',
        'description' => 'XSS attempt in email'
    ],
    [
        'email' => "' OR 1=1 --",
        'password' => 'anything',
        'expected' => 'failure',
        'description' => 'SQL Injection attempt'
    ],
    [
        'email' => 'admin@test.com',
        'password' => '',
        'expected' => 'failure',
        'description' => 'Empty password'
    ],
    [
        'email' => 'admin@test.com',
        'password' => 'Admin@123',
        'expected' => 'success',
        'description' => 'Valid login'
    ]
];


foreach ($testCases as $index => $testCase) {
    echo "Test Case #" . ($index + 1) . ": {$testCase['description']}... ";

    try {
        $driver->get('http://localhost/selenium_with_php/');

        $driver->findElement(WebDriverBy::name('email'))->clear()->sendKeys($testCase['email']);
        $driver->findElement(WebDriverBy::name('password'))->clear()->sendKeys($testCase['password']);
        $driver->findElement(WebDriverBy::id('loginBtn'))->click();

        sleep(1);

        $currentUrl = $driver->getCurrentURL();
        $pageSource = $driver->getPageSource();

        $isSuccess = strpos($pageSource, 'Login Success') !== false;

        if (($testCase['expected'] === 'success' && $isSuccess) ||
            ($testCase['expected'] === 'failure' && !$isSuccess)
        ) {
            echo "\033[32mPassed\033[0m\n";
        } else {
            echo "\033[31mFailed\033[0m\n";
        }
    } catch (Exception $e) {
        echo "Exception: " . $e->getMessage() . "\n";
    }
}

$driver->quit();
