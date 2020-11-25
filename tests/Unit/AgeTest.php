<?php

test('date of birth WITH time returns age in years, days and hours', function () {
    $dobWithTime = DateTime::createFromFormat('Y-m-d H:i', '1985-08-12 19:05');
    $this->assertTrue(false);
});

test('date of birth WITHOUT time returns age in years, days and hours', function () {
    $dobWithTime = DateTime::createFromFormat('Y-m-d H:i', '1985-08-12 19:05');
    $this->assertTrue(false);
});

test('Leap year date of birth WITH time returns age in years, days and hours', function () {
    $dobWithTime = DateTime::createFromFormat('Y-m-d H:i', '1985-08-12 19:05');
    $this->assertTrue(false);
});

test('Leap year date of birth WITHOUT time returns age in years, days and hours', function () {
    $dobWithTime = DateTime::createFromFormat('Y-m-d H:i', '1985-08-12 19:05');
    $this->assertTrue(false);
});
