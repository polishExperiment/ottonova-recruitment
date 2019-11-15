<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once('Employee.php');

/**
 * Class EmployeeTest
 *
 * @author Paweł Zwoliński <p.zwolin@gmail.com>
 */
class EmployeeTest extends TestCase
{
    public function testVacationDays()
    {
        $employee  = new Employee("Hans Müller", new DateTime('1950-12-30'), new DateTime('2001-01-01'));
        $employee2 = new Employee("Angelika Fringe", new DateTime('1966-06-09'), new DateTime('2001-01-15'));
        $employee3 = new Employee("Peter Klever", new DateTime('1991-07-12'), new DateTime('2016-05-15'), 27);
        $employee4 = new Employee("Marina Helter", new DateTime('1970-01-26'), new DateTime('2018-01-15'));
        $employee5 = new Employee("Sepp Meier", new DateTime('1980-05-23'), new DateTime('2017-12-01'));

        $this->assertSame(33, $employee->getVacationDaysForYear(2001));
        $this->assertSame(28, $employee2->getVacationDaysForYear(2001));
        $this->assertSame(16, $employee3->getVacationDaysForYear(2016));
        $this->assertSame(27, $employee4->getVacationDaysForYear(2018));
        $this->assertSame(2, $employee5->getVacationDaysForYear(2017));
    }
}
