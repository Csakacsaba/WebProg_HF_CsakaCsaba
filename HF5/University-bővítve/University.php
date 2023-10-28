<?php
require_once "AbstractUniversity.php";

class University extends AbstractUniversity
{
    private function isSubjectExists(string $code): bool
    {
        if (count($this->subjects) == 0) return false;
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $code) {
                return true;
            }
        }
        return false;
    }

    public function addSubject(string $code, string $name): Subject
    {
        if (!$this->isSubjectExists($code, $name)) {
            $subject = new Subject($code, $name);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception("Subject exists!");
        }
    }


    public function addStudentOnSubject(string $subjectCode, Student $student): void
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
//        return [];
    }

    public function getStudentsForSubject(string $subjectCode): array
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $sum = 0;
        foreach ($this->subjects as $subject){
            foreach ($subject->getStudents() as $student) {
                $sum += 1;
            }
        }
        return $sum;
    }

    public function deleteSubject(Subject $subject)
    {
        if (!$this->hasSubject($subject)) {
            throw new Exception("A tantárgy nem található a listában.");
        }

        $students = $subject->getStudents();

        if (count($students) === 0) {
            foreach ($this->subjects as $key => $s) {
                if ($s === $subject) {
                    unset($this->subjects[$key]);
                    return;
                }
            }
        } else {
            throw new Exception("A tantárgyhoz vannak hozzárendelt hallgatók, nem lehet törölni." . "<br>");
        }
    }

    private function hasSubject(Subject $subject)
    {
        return in_array($subject, $this->subjects);
    }




    public function print(): void
    {
        foreach ($this->subjects as $subject) {
            echo "<br>" . '---------------------------------' . "<br>";
            echo $subject . "<br>";
            echo '---------------------------------' . "<br>";

            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . " - " . $student->getStudentNumber();
                echo "<br>";
            }
        }
    }
}