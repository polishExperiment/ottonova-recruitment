<?php
/**
 * I assume that non-integer values of vacation days should be rounded.
 *
 * In order to run this script type `php vacation.php <year>`.
 * In order to run unit test for Employee class type `vendor/bin/phpunit EmployeeTest.php`.
 */
declare(strict_types=1);

require_once('Employee.php');

$employees = [
    new Employee("Hans Müller", new DateTime('1950-12-30'), new DateTime('2001-01-01')),
    new Employee("Angelika Fringe", new DateTime('1966-06-09'), new DateTime('2001-01-15')),
    new Employee("Peter Klever", new DateTime('1991-07-12'), new DateTime('2016-05-15'), 27),
    new Employee("Marina Helter", new DateTime('1970-01-26'), new DateTime('2018-01-15')),
    new Employee("Sepp Meier", new DateTime('1980-05-23'), new DateTime('2017-12-01')),
];

/** @var Employee $employee */
foreach ($employees as $employee) {
    echo sprintf("%s %d\n", $employee->getName(), $employee->getVacationDaysForYear((int) $argv[1]));
}
