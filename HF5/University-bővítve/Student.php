<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    public string $name;
    public string $studentNumber;
    private array $grades = [];

    /**
     * @param string $name
     * @param string $studentNumber
     */
    public function __construct(string $name, string $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $studentNumber
     */
    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function setGrade(Subject $subject, float $grade): void
    {
        $this->grades[$subject->getCode()][] = $grade;
    }

    public function getAvgGrade()
    {
        if (empty($this->grades)) {
            return 0.0;
        } else {
            foreach ($this->grades as $courseCode => $grades) {
                $average = array_sum($grades) / count($grades);
            }
        }
        return $average;
    }

    public function printGrades(): void
    {
        foreach ($this->grades as $courseCode => $grades) {
            $gradeList = implode(', ', $grades);   // az imploddal össze fűzzük a jegyeket és elválasszuk a (, )-el így jelenítem meg egyben
            $average = array_sum($grades) / count($grades);
            $formattedAvgGrade = number_format($average, 2);
            echo $this->getName(). "→" . "$courseCode - Jegyek: $gradeList - Átlag: $formattedAvgGrade" . PHP_EOL . "<br>";
        }
    }


}