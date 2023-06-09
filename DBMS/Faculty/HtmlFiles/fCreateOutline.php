<?php
if (isSet($_POST['submit'])) 
{
    include 'connection.php';

    $courseCode = $_POST['courseCode'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];
    $secNum = $_POST['secNum'];

    $mySectionID_query = "SELECT `SectionID` FROM `section` WHERE `CourseID` = '$courseCode' AND `Semester` = '$semester' AND `Year` = '$year' AND `SectionNumber` = '$secNum'";
    $result = mysqli_query($conn, $mySectionID_query);
    $row = mysqli_fetch_assoc($result);
    $mySectionID = $row['SectionID'];

    $roomNumber = $_POST['roomNumber'];
    $lessonPlan = $_POST['lessonPlan'];
    $markDistribution = $_POST['markDistribution'];
    $grading = "90 and Above = A
    85-89 = A-
    80-84 = B+
    75-79 = B
    70-74 = B-
    65-69 = C+
    60-64 = C
    55-59 = C-
    50-54 = D+
    45-49 = D
    45 and Below = F";
    $syllabus = $_POST['syllabus'];
    $book = $_POST['book'];

    $sql = "INSERT INTO `course_outline`(`SectionID`, `LessonPlan`, `RoomNumber`, `MarkDistribution`, `Grading`, `Syllabus`, `Book`) VALUES ('$mySectionID','$lessonPlan','$roomNumber','$markDistribution','$grading','$syllabus','$book')";
    mysqli_query($conn, $sql);
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="CSSFolder/dDashboard.css"> -->
    <!-- <link rel="stylesheet" href="CSSFolder/dSidebar.css"> -->
    <link rel="stylesheet" href="../CSSFolder/dSidebar.css">
    <link rel="stylesheet" href="../CSSFolder/mainHome.css">
    <link rel="stylesheet" href="../CSSFolder/dDashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <aside class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/dean.png" alt="R">
                </span>

                <div class="text logo-text">
                    <span class="name">Mahady Hasan</span>
                    <span class="profession">Dean</span>
                </div>
            </div>
            <img class="toggle" src="../img/arrow.png" alt="R">
            <!-- <i class='bx bx-chevron-right toggle'></i> -->
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <img src="../img/IUBlogo.png" alt="R">
                    <span class="text nav-text">SPRM</span>
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="fDashboard.html">
                            <img src="../img/dashboard.png" alt="D">
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="fStudentReport.html">
                            <img src="../img/analytics.png" alt="A">
                            <span class="text nav-text">Student Report</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="fQuestions.html">
                            <img src="../img/question.png" alt="A">
                            <span class="text nav-text">Add Questions</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="fCreateExam.html">
                            <img src="../img/report.png" alt="R">
                            <span class="text nav-text">Create Exam</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="fevaluation.html">
                            <img src="../img/evaluate.png" alt="">
                            <span class="text nav-text">Evaulate Students</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="fCreateOutline.html">
                            <img src="../img/course-outline.png" alt="">
                            <span class="text nav-text">Create Course Outline</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="fDownload.html">
                            <img src="../img/download-outline.png" alt="">
                            <span class="text nav-text">Download Course Outline</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark </span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </aside>

    <section class="LogoSPRM">
        <div class="sprm">SPRM</div>
    </section>

    <section class="mainHome ms-2 p-4">
        <form action="" method="POST">

            <div style="margin-top:10px;" class="course_outline_head">
                <div class="rectangle">
                    <p class="fs-5 fw-bold" style="color: var(--text-color);">Course Outline</p>
                </div>
                <table>
                    <tr>
                        <th>Course Code</th>
                        <td><input type="text" class="course-title" placeholder="Enter Course Code" name="courseCode">
                        </td>
                        <th>Room Number</th>
                        <td><input type="text" class="course-title" placeholder="Enter Room Number" name="roomNumber">
                        </td>
                    </tr>
                    <tr>
                        <th>Section</th>
                        <td><input type="text" class="course-title" placeholder="Enter Section" name="secNum"></td>
                        <th>Semester</th>
                        <td><input type="text" class="course-title" placeholder="Enter Semester" name="semester"></td>
                    </tr>
                    <tr>
                        <th>Credit Value</th>
                        <td><input type="text" class="course-title" placeholder="Enter Credit Value" name="creditValue">
                        </td>
                        <th>Year</th>
                        <td><input type="text" class="course-title" placeholder="Enter Year" name="year">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="course_description mt-3">
                <div class="rectangle">
                    <p class="fs-5 fw-bold" style="margin-bottom: 0px; color: var(--text-color);">Lesson Plan</p>
                </div>
                <textarea name="lessonPlan" class="text-area" cols="90" rows="15" placeholder="Enter Lesson Plan here"></textarea>
            </div>

            <div class="course_policy mt-3" style="color: var(--text-color);">
                <div class="rectangle">
                    <p class="fs-5 fw-bold" style="margin-bottom: 0px;">Course Policy</p>
                </div>
                <p>a. It is the student's responsibility to gather information about the assignments/project and cover
                    topics
                    during the lectures missed. Regular class attendance is mandatory. Points will be taken off for
                    missing
                    classes. Without 70% of attendance, sitting for the final exam is NOT allowed. Students should come
                    on
                    time to get the attendance. In the event of failing 70% of attendance, a student will receive a W
                    grade
                    automatically.
                    <br>
                    b. Same project work is assigned to all sections. Students should work in groups for the project.
                    They are
                    required to prepare a final report on the project which will be incrementally developed through
                    assignments.
                    <br>
                    c. The date and syllabus of class tests, Mid-Term and Final-Term will be announced in the class.
                    There is NO
                    provision for make-up.
                    <br>
                    d. Both the Mid-Term and Final-Term exams will be coordinated exams and will be held on a specific
                    date
                    for all the sections.
                    <br>
                    e. The reading materials for each class will be given prior to that class so that students may have
                    a cursory
                    look into the materials.
                    <br>
                    f. Class participation is vital for a better understanding of the topics of this course. Students
                    are invited to
                    raise questions.
                    <br>
                    g. Students should take tutorials with the instructor during office hours. Prior appointment is
                    required.
                    <br>
                    h. Students must maintain the IUB code of conduct and ethical guidelines offered by the school of
                    computer
                    science and engineering.
                    <br>
                    i. No working mobile phones are allowed in class. Using one for any purpose will result in serious
                    consequences.
                </p>
            </div>

            <div class="academic_dishonesty" style="color: var(--text-color);">
                <div class="rectangle">
                    <p class="fs-6 fw-bold" style="margin-bottom: 0px;">ACADEMIC DISHONESTY</p>
                </div>
                <p> a. A student who cheats, plagiarizes, or furnishes false, misleading information in the course is
                    subject to
                    disciplinary action up to and including an F grade in the course and/or suspension/expulsion from
                    the
                    University.
                    <br>
                    b. Students must maintain the code of IUB.
                    <br>
                    c. The goal of homework is to give you practice in mastering the course material. Consequently, you
                    are
                    encouraged to collaborate on problem sets. In fact, students who form study groups generally do
                    better on
                    exams than do students who work alone. If you do work in a study group, however, you owe it to
                    yourself
                    and your group to be prepared for your study group meeting. Specifically, you should spend at least
                    30-45
                    minutes trying to solve each problem beforehand by yourself. If your group is unable to solve a
                    problem,
                    talk to other groups or ask your recitation instructor or teaching assistant assigned to your class.
                    <br>
                    d. You must write up each problem solution by yourself without assistance. It is a violation of this
                    policy to
                    submit a problem solution that you cannot orally explain to a member of the course staff.
                    <br>
                    e. No collaboration whatsoever is permitted during examination.
                    <br>
                    f. Plagiarism and other anti-intellectual behavior cannot be tolerated in any academic environment
                    that
                    prides itself on individual accomplishment. If you have any questions about the collaboration
                    policy, or if
                    you feel that you may have violated the policy, please talk to one of the course staff. Although the
                    course
                    staff is obligated to deal with cheating appropriately, we are more understanding and lenient if we
                    find out
                    from the transgressor himself or herself rather than from a third party or by ourselves.
                </p>

            </div>

            <div class="student_with_disability_and_stress" style="color: var(--text-color);">
                <div class="rectangle">
                    <p class="fs-6 fw-bold" style="margin-bottom: 0px;">STUDENT WITH DISABILITIES AND STRESS</p>
                </div>
                <p>Students with disabilities are required to inform the Department of Computer Science & Engineering of
                    any
                    specific requirement for classes or examination as soon as possible. Additionally, if you experience
                    significant
                    stress or worry, changes in mood, or problems eating or sleeping this semester, whether because of
                    this or
                    any other courses or factors, please do not hesitate to reach out immediately, at any hour, to any
                    of the
                    course's heads to discuss.
                </p>
            </div>

            <div class="non_discremination_policy" style="color: var(--text-color);">
                <div class="rectangle">
                    <p class="fs-6 fw-bold" style="margin-bottom: 0px;">NON DISCREMINATION POLICY</p>
                </div>
                <p>The course and University policy prohibit discrimination based on race, color, religion, sex, marital
                    or parental
                    status, national origin or ancestry, age, mental or physical disability, sexual orientation,
                    military status. If you
                    see either by course instructor or any other person related to course showing any form of
                    discrimination,
                    please inform the proctors office of the wrongdoing.
                </p>
            </div>

            <div class="mark_distribution mt-4" style="color: var(--text-color);">
                <div class="rectangle">
                    <p class="fs-5 fw-bold" style="margin-bottom: 0px;">Mark Distribution</p>
                </div>
                <textarea name="markDistribution" class="text-area" cols="90" rows="15" placeholder="Enter Mark Distribution here"></textarea>
            </div>

            <div class="mt-4" style="color: var(--text-color);">
                <p class="fs-5 fw-bold" style="margin-bottom: 0px;">Grade Conversion Scheme</p>
                <p class="fs-6">The following chart will be followed for final
                    grading for this course. <br>
                    <span class="fst-italic">* Numbers are inclusive</span>
                </p>

                <div style="margin-bottom:15px;" class="grades" name="grading">
                    <table>
                        <tr>
                            <th>A</th>
                            <th>A-</th>
                            <th>B+</th>
                            <th>B</th>
                            <th>B-</th>
                            <th>C+</th>
                            <th>C</th>
                            <th>C-</th>
                            <th>D+</th>
                            <th>D</th>
                            <th>F</th>
                        </tr>
                        <tr>
                            <td>90-100</td>
                            <td>85-89</td>
                            <td>80-84</td>
                            <td>75-79</td>
                            <td>70-74</td>
                            <td>65-69</td>
                            <td>60-64</td>
                            <td>55-59</td>
                            <td>50-54</td>
                            <td>45-49</td>
                            <td>0-44</td>


                        </tr>
                    </table>
                </div>
            </div>


            <div class="mt-4" style="color: var(--text-color);">
                <p class="fs-5"> <b>Audit:</b><br><span class="fs-6">
                        Students who are willing to audit the course are welcome during the first two classes and are
                        advised to
                        contact the instructor after that.</span></p>
            </div>

            <div class="stuSyllabus" style="color: var(--text-color);">
                <div class="rectangle">
                    <p class="fs-4 fw-bold" style="margin-bottom: 0px;">Syllabus</p>
                </div>
                <textarea name="syllabus" class="text-area" cols="90" rows="15" placeholder="Enter Syllabus here"></textarea>
            </div>

            <div class="stuBook mt-3" style="color: var(--text-color);">
                <div class="rectangle">
                    <p class="fs-4 fw-bold" style="margin-bottom: 0px;">Book</p>
                </div>
                <textarea name="book" class="text-area" cols="90" rows="15" placeholder="Enter Book here"></textarea>
            </div>


            <button style="margin-bottom:20px;" type="submit" name="submit" class="submitButton mt-2 btn btn-success">Submit</button>
        </form>
    </section>



    <script src="../JSFolder/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>