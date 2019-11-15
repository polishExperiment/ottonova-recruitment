<?php

declare(strict_types=1);

/**
 * Class Employee
 *
 * @author Paweł Zwoliński <p.zwolin@gmail.com>
 */
class Employee
{
    private const VACATION = 26;

    /** @var string */
    private $name;

    /** @var DateTime */
    private $dateOfBirth;

    /** @var DateTime */
    private $contractStartDate;

    /** @var int|null */
    private $specialContract;

    /**
     * Employee constructor.
     *
     * @param string   $name
     * @param DateTime $dateOfBirth
     * @param DateTime $contractStartDate
     * @param int|null $specialContract
     */
    public function __construct(string   $name,
                                DateTime $dateOfBirth,
                                DateTime $contractStartDate,
                                int      $specialContract = null)
    {
        $this->name              = $name;
        $this->dateOfBirth       = $dateOfBirth;
        $this->contractStartDate = $contractStartDate;
        $this->specialContract   = $specialContract;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return DateTime
     */
    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @return DateTime
     */
    public function getContractStartDate(): DateTime
    {
        return $this->contractStartDate;
    }

    /**
     * @param int $year
     *
     * @return int
     *
     * @throws Exception
     */
    public function getVacationDaysForYear(int $year): int
    {
        $contractStartYear = (int) $this->contractStartDate->format('Y');

        if ($contractStartYear > $year) {
            return 0;
        }

        $vacation = $this->specialContract ?? self::VACATION;
        $extraAgeDays = 0;
        if (($age = $this->getAge()) >= 30) {
            $extraAgeDays = floor(($age - 30) / 5);
        }

        $vacation += $extraAgeDays;

        if ($contractStartYear === $year) {
            $monthlyVacation = $vacation / 12;
            $months = 12 - (int) $this->contractStartDate->format('n');
            if ((int) $this->contractStartDate->format('j') === 1) {
                $months += 1;
            }

            return (int) round($monthlyVacation * $months);
        }

        return (int) round($vacation);
    }

    /**
     * @return int
     *
     * @throws Exception
     */
    private function getAge(): int
    {
        return $this->dateOfBirth->diff(new DateTime('now'))->y;
    }
}
