<?php
require_once('tcpdf/tcpdf.php');
include('includes/dbconnection.php');

// Fetch all records from the tbleveldetails table
$sql = "SELECT * FROM tblstudent
INNER JOIN tbpersonal ON tblstudent.StuID = tbpersonal.Register_no
WHERE tblstudent.StuID = tbpersonal.Register_no";

$query = $dbh->prepare($sql);
$query->execute();
$student = $query->fetch(PDO::FETCH_ASSOC);



// Check if there are records
if (count($student) > 0) {
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // Set document information
   
    $pdf->AddPage();
    $pdf->SetMargins(15, 12, 12, 10);

    $pdf->SetFont('times', 'B', 20);

    $pdf->Cell(0, 10, 'PUDUCHERRY TECHONOLOGICAL UNIVERESITY', 0, 1, 'C');
    
    // Set font to Times New Roman, but not bold
    $pdf->SetFont('times', '', 12);
    $pdf->Cell(0, 10, '(An Autonomous Institution of Government of Puducherry)', 0, 1, 'C');
     $pdf->SetFont('times', 'B', 18);
    $pdf->Ln(2);
    $pdf->Cell(0, 10, 'Puducherry-605014', 0, 1, 'C');
    $pdf->Ln(9);
    $pdf->Cell(0, 10, 'STUDENT PROFILE', 0, 1, 'C');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, 'BATCH: 2022-2024', 0, 1, 'C');
    $pdf->Ln(3);
   

    // Add default image
    $defaultImagePath = 'D:\ptu1.jpg'; // Replace with the actual path to your default image
    $pdf->Image($defaultImagePath, 90, $pdf->GetY(), 35, 50);

    $pdf->SetFont('times', 'B', 12);
    $pdf->Ln(60);
    $pdf->Cell(0, 10, 'NAME :...............................................................................................................................................', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, 'COURSE & BRANCH :.....................................................................................................................', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0,10, 'ENROLLMENT NUMBER :............................................................................................................', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, 'REGISTER NUMBER :......................................................................................................................', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, 'YEAR OF ADMISSION :....................................................................................................................', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, 'YEAR OF COMPLECTION :.............................................................................................................', 0, 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 1, 'ADMISSION                                 :REGULAR/LATERAL', 0, 1, 'L');
    $pdf->Ln(10);
    $pdf->Cell(0, 15, 'NAME OF FACULTY ADVISIORS:                ', 0, 1, 'L');
    $pdf->Cell(0, 15, 'NAME OF CLASS ADVISIORS:                ', 0, 1, 'L');
    $pdf->Ln(500); 

    $pdf->Ln(50); // Add some space before the table

    $pdf->Cell(0, 15, ' COUNSELLING DETAILS ', 0, 1, 'C');
// Create an empty table
// Create an empty table with custom column spacing
$tableHeader = array('SL.NO', 'Date of Counseling', 'Purpose', 'Signature of the Student/Parent', 'Signature of the Faculty ');
$columnWidths = array(20, 40, 30, 50, 40); // Customize column widths

$pdf->SetFillColor(200, 220, 255);

// Set font size
$pdf->SetFont('times', '', 10);

// Add column headers with custom widths
foreach ($tableHeader as $key => $col) {
    $pdf->Cell($columnWidths[$key], 10, $col, 1, 0, 'C', 1);
}


// Add empty rows to the table
$numRows = 10; // Adjust the number of rows as needed
for ($i = 0; $i < $numRows; $i++) {
    $pdf->Ln();
    foreach ($columnWidths as $width) {
        $pdf->Cell($width, 10, '', 1, 0, 'L');
    }
}

$pdf->Ln(500);
$pdf->SetFont('times', 'B', 16);
$pdf->Cell(0, 10, 'PUDUCHERRY TECHONOLOGICAL UNIVERESITY', 0, 1, 'C');
$pdf->SetFont('times', 'B', 12);
$pdf->Ln(2);
$pdf->Cell(0, 10, 'Puducherry-605014', 0, 1, 'C');
$pdf->SetFont('times', 'B', 12);
$pdf->Ln(8);

$imagePath = "../admin/images/" . $student['Image']; // Replace 'Image' with the actual column name

// Check if the image file exists
if (file_exists($imagePath)) {
    // Embed the image in the PDF
    $pdf->Image($imagePath, 150, $pdf->GetY(), 35, 45);
} else {
    // If the image file doesn't exist, you can provide an alternative or leave it blank
    $pdf->Cell(35, 45, 'No Image', 1, 0, 'C');
}

$pdf->Cell(0, 10, '1. NAME                                    : ' . $student['name'], 0, 1, 'L');
$pdf->Cell(0, 10, '2. Course & Branch                  : ' . $student['course'], 0, 1, 'L');
$pdf->Cell(0, 10, '3. Admission category               : ' . $student['Admission_category'], 0, 1, 'L');
$pdf->SetFont('times', '', 12);
$pdf->Cell(0, 10, '   a) Regular/Lateral               : ', 0, 1, 'L');
$pdf->Cell(0, 10, '   b) Region                              : ' . $student['region'], 0, 1, 'L');
$pdf->Cell(0, 10, '   c) Community                        : ' . $student['community'], 0, 1, 'L');
$pdf->Cell(0, 10, '   d) Special Category                : ' . $student['Special_category'], 0, 1, 'L');
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, '4. Enrollment Number                : ' . $student['Enrollment_no'], 0, 1, 'L');
$pdf->Cell(0, 10, '5. Register Number                      : ' . $student['Register_no'], 0, 1, 'L');
$pdf->Cell(0, 10, '6. Date of birth                        : ' . $student['DOB'], 0, 1, 'L');
$pdf->Cell(0, 10, '7. Mother Tongue                      : ' . $student['Mother_Tongue'], 0, 1, 'L');
$pdf->Cell(0, 10, '8. Blood group                               : ' . $student['Blood_group'], 0, 1, 'L');
$pdf->Cell(0, 10, '9. Hostel/Day scholar                : ' . $student['DH'], 0, 1, 'L');
$pdf->Cell(0, 10, '10. Parent/Guardians Name            : ' . $student['Parent_name'], 0, 1, 'L');
$pdf->Cell(0, 10, '11. Address for Communication        : ' . $student['Address'], 0, 1, 'L');
$pdf->SetFont('times', '', 12);
$pdf->Ln(15);
$pdf->Cell(0, 10, '    Email                            : ' . $student['Email'], 0, 1, 'L');
$pdf->Cell(0, 10, '    Mobile                           : ' . $student['Mobile'], 0, 1, 'L');
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, '12. Permanent Address               : ' . $student['Paddress'], 0, 1, 'L');
$pdf->Ln(15);
$pdf->SetFont('times', '', 12);
$pdf->Cell(0, 10, '    Email                            : ' . $student['Email'], 0, 1, 'L');
$pdf->Cell(0, 10, '    Mobile                           : ' . $student['Mobile'], 0, 1, 'L');
$pdf->Ln(30);
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, '13  Family Details                        : ', 0, 1, 'L');

  
$emptyTableHeader = array('Name Of Family members', 'Relationship', 'Qualification', 'Occupation'); // Replace with your column headers
$columnWidths = array(60, 30, 40, 40); // Set the width for each column

$pdf->SetFillColor(200, 220, 255);

// Add column headers
for ($i = 0; $i < count($emptyTableHeader); $i++) {
    $pdf->Cell($columnWidths[$i], 10, $emptyTableHeader[$i], 1, 0, 'C', 1);
}

$pdf->Ln(10);

// Add empty rows to the table
for ($i = 0; $i < 5; $i++) { // Adjust the number of rows as needed
    for ($j = 0; $j < count($columnWidths); $j++) {
        $pdf->Cell($columnWidths[$j], 10, '', 1, 0, 'C');
    }
    $pdf->Ln(10);
}
$pdf->Ln(10);
$pdf->SetFont('times', '', 12);
$pdf->Cell(0, 10, ' Annual Income of Parent/Guardian:Rs. ....................................... ENTRY    ', 0, 1, 'L');
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, 'LEVEL DETAILS        '  , 0, 10, 'C');
$pdf->Ln(10);
$pdf->SetFont('times', '', 12);


$query = $dbh->query("SELECT * FROM tbleveldetails
INNER JOIN semester_grades ON tbleveldetails.cregisterno  = semester_grades.registration_number	
WHERE tbleveldetails.cregisterno  = semester_grades.registration_number	");
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Start building the table rows
$tableRows = "";

foreach ($results as $row) {
  
// Your HTML template
$tbl = <<<EOD
<table border="1" style="margin: auto; text-align: center;">
    <tr>
        <td rowspan="4">Secondary level</td>
        <td colspan="7">State Board/Matric/CBSE/Others:   {$row['board']}</td>
    </tr>
    <tr>
        <td rowspan="1">Name of the Institution</td>
        <td colspan="6">    {$row['schoolname']}</td>
    </tr>
    <tr>
        <td rowspan="1">Medium of study </td>
        <td colspan="6">{$row['medium']}</td>
    </tr>
    <tr>
        <td rowspan="1">Total Marks </td>
        <td colspan="1">{$row['totalmarks']}</td>
        <td colspan="1"> Out of</td>
        <td colspan="1">10 CGPA</td>
        <td colspan="1">Year of Passing</td>
        <td colspan="2"> {$row['yearofpassing']}</td>
    </tr>

    
    <tr>
         <td rowspan="7">Higher Secondary Level</td>  
        <td colspan="7">State Board/Matric/CBSE/Others: {$row['board']}</td>
    </tr>
    <tr>
        <td rowspan="1">Name of the Institution</td>
        <td colspan="6">{$row['nameofinstitution1']}</td>
    </tr>


    <tr>
        <td rowspan="1">Medium of study</td>
        <td colspan="6"> {$row['medium']}</td>
    </tr>
    <tr>
        <td rowspan="1">Total Marks </td>
        <td colspan="1">{$row['tmarks1']}</td>
        <td colspan="1"> Out of</td>
        <td colspan="1">10 CGPA</td>
        <td colspan="1">Year of Passing</td>
        <td colspan="2"> {$row['yearofpassing2']}</td>

    </tr>


    <tr>
        <td rowspan="3">Subjects  /marks </td>
        <td colspan="1">Lang1":</td>
        <td colspan="1">{$row['lan1']}</td>
        <td colspan="1">outof:</td>
        <td colspan="1">Lang2:</td>
        <td colspan="1">{$row['lan2']}</td>
        <td colspan="1">outof:</td> 
    </tr>
    <tr>
        <td colspan="1">Sub1":</td>
        <td colspan="1">Mark:{$row['sub1']}</td>
        <td colspan="1">outof:</td>
        <td colspan="1">Sub3:</td>
        <td colspan="1">Mark:{$row['sub3']}</td>
        <td colspan="1">outof:</td>
    </tr>
    
    <tr>
        <td colspan="1">Sub2":</td>
        <td colspan="1">mark:{$row['sub2']}</td>
        <td colspan="1">outof:</td>
        <td colspan="1">Sub4:</td>
        <td colspan="1">Mark:{$row['sub4']}</td>
        <td colspan="1">outof:</td>
    </tr>


    $tableRows
    </table>
EOD;
}

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, 'CENTAC RANK     '  , 0, 10, 'L');
$tableRows = "";

foreach ($results as $row) {
  
// Your HTML template
$tbl = <<<EOD
<table border="1"  >
    <tr>

        <th rowspan="1">Category</th>
        <th rowspan="1">Overall Merit Rank</th>
        <th rowspan="1">Category Rank</th>
    
    </tr>
    <tr>
        <td >{$row['category']}</td>
        <td>{$row['Overallmeritrank']}</td>
        <td>{$row['Overallmeritrank']}</td>
    </tr>
   
    </table>
    $tableRows
 
EOD;
}

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, 'FOR OTHER STATE CANDIDATES ONLY  '  , 0, 10, 'L');
$pdf->SetFont('times', 12);
$tableRows = "";

foreach ($results as $row) {
  
// Your HTML template
$tbl = <<<EOD
<table border="1">
    <tr>

        <th rowspan="1">Category</th>
        <th rowspan="1">{$row['JEEmarks']}</th>
        <th rowspan="1">Overall Merit Rank</th>
        <th rowspan="1">{$row['OverallMeritRank1']}</th>
    </tr>
    </table>
    $tableRows
 
EOD;
}
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Ln(10);
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 1, 'PERFORMANCE IN POLYTECHNIC (FOR LATERAL ENTRANTS):', 0, 1, 'L');
$pdf->Cell(0, 10, 'CLASS/DISTINCTION OBTAINED', 0, 1, 'L');
$pdf->SetFont('times',  12);
$tableRows = "";

foreach ($results as $row) {
  
// Your HTML template
$tbl = <<<EOD
<table border="1" style="margin: auto; text-align: center;">
    <tr>

        <td colspan="5">Name of the Institution : {$row['nameofinstitution']}</td>
     
    </tr>
    <tr>
        <td>Total Marks</td>
        <td> {$row['tmarks']}</td>
        <td>out of</td>
        <td> 10 </td>
        <td>Year of passing{$row['yearofpassing1']}</td>
    </tr>
    
    </table>
    $tableRows
 
EOD;
}
$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, ' Extra & Curricular Activities   : .........................................', 0, 1, 'L');
$pdf->Cell(0, 10, '       ................................................', 0, 1, 'L');
$pdf->Cell(0, 10, ' Co-Curricular Activities        : .........................................', 0, 1, 'L');
$pdf->Cell(0, 10, '      ................................................', 0, 1, 'L');
$pdf->Cell(0, 10, ' Prizes/Honours Recevied         : .........................................', 0, 1, 'L');
$pdf->Cell(0, 10, ' Languages Known                 : ................................................', 0, 1, 'L');
$pdf->Cell(0, 10, '       ................................................', 0, 1, 'L');
$pdf->Cell(0, 10, ' Others                          : ................................................', 0, 1, 'L');
$pdf->Cell(0, 10, '       ................................................', 0, 1, 'L');
$pdf->Ln(10);
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 5, 'ACDEMIC PERFOMANCE', 0, 1, 'C');

$pdf->SetFont('times', 12);
if (!empty($results)) {
    // Loop through results
    for ($semester = 1; $semester <= 4; $semester++) {
        // Your HTML template for semester heading
        $semesterHeading = <<<EOD
        
        <table border="0" style="text-align: left; font-weight: bold;">
            <tr>
                <td colspan="6">SEMESTER $semester</td>
            </tr>
        </table>
EOD;

        // Write the semester heading to PDF for each semester
        $pdf->writeHTML($semesterHeading, true, false, false, false, '');

        // Your HTML template for table header
        $tableHeader = <<<EOD
        <table border="1" style="text-align: center;">
            <tr>
                <th rowspan="2">Subject Code</th>
                <th rowspan="2">Subject</th>
                <th rowspan="2">Name of the Faculty</th>
                <th rowspan="1">First Attempt Mark/Grade</th>
                <th colspan="2">If failed in First Attempt</th>
            </tr>
            <tr>
                <th rowspan="1">University Exam Grade</th>
                <th colspan="1">Grade when Passed</th>
                <th colspan="1">No of Attempts</th>
            </tr>
EOD;

        $tableRows = ''; // Reset tableRows for each semester

        foreach ($results as $row) {
            if ($row['semester'] == $semester) {
                // Your HTML template for each row
                $tableRows .= <<<EOD
                <tr>
                    <td> {$row['subject_code']}</td>
                    <td> {$row['subject']}</td>
                    <td> {$row['faculty']}</td>
                    <td> {$row['grade']}</td>
                    <td> </td>
                    <td> {$row['attempts']}</td>
                </tr>
EOD;
            }
        }

        // Combine the header, rows, and footer for each semester
        $tableContent = $tableHeader . $tableRows . "</table>";

        // Write the HTML content to PDF for each semester
        $pdf->writeHTML($tableContent, true, false, false, false, '');

        // Your HTML template for the footer for each semester
        $footerContent = <<<EOD
        <table border="1" style="text-align: center;">
            <tr>
                <th rowspan="1">GPA</th>
                <th rowspan="1">CGPA</th>
                <th rowspan="1">RANK IF ANY</th>
                <th rowspan="1">OVERALL ATTENDANCE</th>
                <th colspan="2">Signature of</th>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2"></td>
                <td rowspan="2"></td>
                <td rowspan="2"></td>
                <td rowspan="1">Faculty Advisor</td>
            </tr>
            <tr>
                <td rowspan="1">HOD</td>
            </tr>
        </table>
EOD;

        // Write the footer to PDF for each semester
        $pdf->writeHTML($footerContent, true, false, false, false, '');
        $pdf->Ln(40);
    }
}
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, 'OVERALL ACADEMIC PERFORMANCE', 0, 1, 'C');

$pdf->Cell(0, 5, '1. UNIVERSITY MARKS/GRADE & RANK:', 0, 1, 'L');
$pdf->Ln(10);

$tbl = <<<EOD
<table border="1" style="margin: auto; text-align: center;">
    <tr>
        <th>SEMESTER</th>
        <th>GPA</th>
        <th>CGPA</th>
        <th>RANK</th>
        <th>SEMESTER</th>
        <th>GPA</th>
        <th>CGPA</th>
        <th>RANK</th>
    </tr>
    <tr>
        <td>I</td>
        <td></td>
        <td></td>
        <td></td>
        <td>V</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    
    <tr>
        <td>II</td>
        <td></td>
        <td></td>
        <td></td>
        <td>VI</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>III</td>
        <td></td>
        <td></td>
        <td></td>
        <td>VII</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>IV</td>
        <td></td>
        <td></td>
        <td></td>
        <td>VIII</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Cell(0, 5, ' CLASS/DISITNCTION:                                                 CGPA:', 0, 1, 'L');
$pdf->Cell(0,10, '2. AWARDS/DISTINCTION WON     :  ', 0, 1, 'L');
$pdf->Cell(0,10, '3. COURSE SEMINAR TITLE       :  ', 0, 1, 'L');
$pdf->Cell(0,30, '4. PROJECT THESIS TITLE/SUPERVISOR     :  ', 0, 1, 'L');
$pdf->Cell(0,10, '5. INPLANT TRAINING     :  ', 0, 1, 'L');
$tbl = <<<EOD
<table border="1" style="margin: auto; text-align: center;">
    <tr>
        <th rowspan="2">SLNO</th>
        <th rowspan="2">NAME & ADDRESS OF THE INDUSTRY</th>
        <th colspan="2">PERIOD OF TRAINING</th>
    </tr>
    <tr>
        <th colspan="1">FROM</th>
        <th colspan="1">TO</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
EOD;
$pdf->writeHTML($tbl, true, true, false, false, '');


$pdf->Cell(0, 5, 'EXIT LEVEL DETAILS', 0, 1, 'L');
$pdf->Cell(0,10, '1. PLACEMENT  :  ', 0, 1, 'L');
$pdf->Cell(0,30, 'a) THROUGH CAMPUS INTERVIEW  ', 0, 1, 'L');
$pdf->Cell(0,30, 'b) THROUGH EXTERNAL AGENCIES   :  ', 0, 1, 'L');
$pdf->Cell(0,10, '2.COMPENTITIVE EXAMINATION-APPEARED/PASSED   :  ', 0, 1, 'L');
$tbl = <<<EOD
<table border="1" style="margin: auto; text-align: center;">
    <tr>
        <th rowspan="2">SLNO</th>
        <th rowspan="2">NAME OF EXAMINATION</th>
        <th colspan="2">APPEARED</th>
        <th colspan="2">QUALIFIED</th>
        <th rowspan="2">RESULT</th>
    </tr>
    <tr>
        <th colspan="1">YES</th>
        <th colspan="1">NO</th>
        <th colspan="1">YES</th>
        <th colspan="1">NO</th>
     
    </tr>
    <tr>
        <td>1.</td>
        <td>GATE</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>2.</td>
        <td>GRE</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>3.</td>
        <td>TOEFL/IELTS</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
     <tr>
        <td>4.</td>
        <td>CAT</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
     <tr>
        <td>5.</td>
        <td>Any other(Mention)</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
EOD;
$pdf->writeHTML($tbl, true, true, false, false, '');
$pdf->Cell(0,10, '3. ADMISSION TO HIGHER STUDIES    ', 0, 1, 'L');
$tbl = <<<EOD
<table border="1" style="margin: auto; text-align: center;">
    <tr>
        <th>INSTITUTION</th>
        <th>COURSE</th>
        <th>YEAR OF ADMISSION</th>
    </tr>
    <tr>
    <th></th>
    <th></th>
    <th></th>
</tr>
</table>
EOD;
$pdf->writeHTML($tbl, true, true, false, false, '');
$pdf->Cell(0,10, '4. RATING OF THE STUDENT BY FACULTY ADVISOR     ', 0, 1, 'L');
$tbl = <<<EOD
<table border="1" style="margin: auto; text-align: center;">
<tr>
<th>EXCELLENT</th>
<th>V.GOOD</th>
<th>GOOD</th>
<th>SATISFACTORY</th>
</tr>
</table>
EOD;
$pdf->writeHTML($tbl, true, true, false, false, '');
$pdf->Cell(0,10, '5. REMARKS BY HOD     ', 0, 1, 'L');
    // Output PDF to a variable
    $pdfContent = $pdf->Output('', 'S');
    
    // Display the PDF for preview
    header('Content-Type: application/pdf');
    echo $pdfContent;
    
    // Provide a link to download
    echo '<a href="data:application/pdf;base64,' . base64_encode($pdfContent) . '">Download PDF</a>';
} else {
    echo 'No records found';
}
?>
