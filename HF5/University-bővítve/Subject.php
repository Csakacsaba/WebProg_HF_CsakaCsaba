<?php

class Subject
{
    private string $code;
    private string $name;
    private array $students = [];

    public function __construct(string $code, string $name, array $students = [])
    {
        $this->code = $code;
        $this->name = $name;
        $this->students = $students;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    private function isStudentExists($studentNumber): bool
    {
        if (count($this->students) == 0) return false;
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() == $studentNumber) {
                return true;
            }
        }
        return false;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    public function addStudent(string $name, string $studentNumber): Student
    {
        if (!$this->isStudentExists($studentNumber)) {
            $student = new Student($name, $studentNumber);
            $this->students[] = $student;
            return $student;
        } else {
            throw new Exception("Student exists!");
        }
    }

    public function deleteStudent(Student $student)
    {
        foreach ($this->students as $key => $s) {
            if ($s === $student) {
                unset($this->students[$key]);
                return;
            }
        }
        throw SubjectHasStudentsException();
    }


    public function __toString(): string
    {

        return $this->getCode() . '-' . $this->getName() . "\n";
    }
}