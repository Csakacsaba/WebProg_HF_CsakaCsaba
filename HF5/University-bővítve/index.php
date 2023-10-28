<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

$university = new University();
$subject = $university->addSubject('112', 'Web II');
$subject2 = $university->addSubject('113', 'Android');
$subject3 = $university->addSubject('114', 'Könyvelés');

$lajos = $subject2->addStudent('Lajos', '123');
$kati = $subject2->addStudent("Kati", '124');
$tamas = $subject2->addStudent("Tamas", '125');
$elod = $subject2->addStudent("Elod", '126');
$peti = $subject->addStudent("Peti", '127');
$kuti = $subject->addStudent("Kuti", '128');

//$university->addStudentOnSubject('113', new Student('Béla', '127'));
//$university->addStudentOnSubject('112', new Student('Kati', '346'));
//$university->addStudentOnSubject('113', new Student('Tamas', '347'));
//$university->addStudentOnSubject('113', new Student('Elod', '348'));

echo $university->getNumberOfStudents() . " hallgato van az összes kurzusban" . "<br>";
//print_r($university->getStudentsForSubject('112'));

//$subject->deleteStudent($lajos);
//$subject2->deleteStudent($tamas);
//$university->deleteSubject($subject);


//Hallgato törlése
try {
    $subject2->deleteStudent($lajos);
    echo "Hallgató törölve: ". $lajos->getName() . PHP_EOL . "<br>";
} catch (Exception $e) {
    echo "Hiba: " . $e->getMessage() . PHP_EOL;
}


//tantárgy törlése
try {
    $university->deleteSubject($subject);
    echo "Tantárgy törölve: ". $subject->getName() . PHP_EOL . "<br>";
} catch (Exception $e) {
    echo "Hiba: " . $e->getMessage() . PHP_EOL;
}
try {
    $university->deleteSubject($subject3);
    echo "Tantárgy törölve: ". $subject3->getName() . PHP_EOL . "<br>";
} catch (Exception $e) {
    echo "Hiba: " . $e->getMessage() . PHP_EOL;
}

$elod->setGrade($subject2, 10);
$elod->setGrade($subject2, 9);
$elod->setGrade($subject2, 3);

$tamas->setGrade($subject2, 9);
$tamas->setGrade($subject2, 6);
$tamas->setGrade($subject2, 10);

$kati->setGrade($subject2, 10);
$kati->setGrade($subject2, 10);
$kati->setGrade($subject2, 4);

$peti->setGrade($subject, 6);
$peti->setGrade($subject, 10);
$peti->setGrade($subject, 9);
$peti->setGrade($subject, 10);

$kuti->setGrade($subject, 4);
$kuti->setGrade($subject, 8);

echo "---------------------------------" . "<br>";

$elod->printGrades();
$tamas->printGrades();
$kati->printGrades();
$peti->printGrades();
$kuti->printGrades();



function sortStudentsByAverageGrade(array $students): array
{
    usort($students, function ($a, $b) {
        return $a->getAvgGrade() <=> $b->getAvgGrade();
    });

    return $students;
}
echo "---------------------------------" . "<br>";
echo "Rendezve: <br>";
$students = [$elod, $tamas, $kati, $peti, $kuti];
$sorted_students = sortStudentsByAverageGrade($students);
foreach ($sorted_students as $student) {
    $formattedAvgGrade = number_format($student->getAvgGrade(), 2);
    echo $student->getName() . " - Átlagjegy: " . $formattedAvgGrade . PHP_EOL . "<br>";
}




$university->print();
