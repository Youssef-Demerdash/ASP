
<?php
include_once "includes/DB.inc.php";
include "classes.php";

$studentsObject = new Student($conn);
$students = $studentsObject->getAllstudents();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'delete' && isset($_POST['ID'])) {
            $studentId = $_POST['ID'];
            $query = $conn->prepare("DELETE FROM students WHERE ID = ?");
            $query->bind_param("i", $studentId);
            $query->execute();

            if ($query->affected_rows > 0) {
                echo json_encode(["type" => "success", "message" => "Student deleted successfully."]);
            } else {
                echo json_encode(["type" => "error", "message" => "Failed to delete student."]);
            }
            exit;
        } elseif ($action === 'search' && isset($_POST['ID'])) {
            $studentId = $_POST['ID'];
            $query = $conn->prepare("SELECT * FROM students WHERE ID = ?");
            $query->bind_param("i", $studentId);
            $query->execute();
            $result = $query->get_result();

            if ($result->num_rows > 0) {
                echo json_encode(["type" => "success", "data" => $result->fetch_assoc()]);
            } else {
                echo json_encode(["type" => "error", "message" => "Student not found."]);
            }
            exit;
        } elseif ($action === 'edit') {
            $studentId = $_POST['ID'];
            $firstName = $_POST['FName'];
            $lastName = $_POST['LName'];
            $email = $_POST['Email'];
            $status = $_POST['Status'];
            $major = $_POST['Major'];
            $minor = $_POST['Minor'];

            $query = $conn->prepare("UPDATE students SET FName = ?, LName = ?, Email = ?, Status = ?, Major = ?, Minor = ? WHERE ID = ?");
            $query->bind_param("ssssssi", $firstName, $lastName, $email, $status, $major, $minor, $studentId);
            $query->execute();

            if ($query->affected_rows > 0) {
                echo json_encode(["type" => "success", "message" => "Student updated successfully."]);
            } else {
                echo json_encode(["type" => "error", "message" => "Failed to update student."]);
            }
            exit;
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/Students_dashboard.css"/>
</head>
<body>
<div class="container mt-5">
    <h1>Students Management</h1>
    <!-- Alert Messages -->
    <div id="alertContainer" class="mt-3"></div>

    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search by ID">
                <button class="search-btn input-group-text" onclick="searchById()">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    Add Student
                </button>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover" id="studentTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($student = $students->fetch_assoc()): ?>
            <tr>
                <th scope="row"><?= htmlspecialchars($student['ID']); ?></th>
                <td><?= htmlspecialchars($student['FName']); ?></td>
                <td><?= htmlspecialchars($student['LName']); ?></td>
                <td><?= htmlspecialchars($student['Email']); ?></td>
                <td><?= htmlspecialchars($student['Status']); ?></td>
                <td class="operation-icons">
                    <i class="fas fa-eye" onclick="showStudentInfo(<?= $student['ID']; ?>)"></i>
                    <i class="fas fa-edit" onclick="editStudent(this)"></i>
                    <i class="fas fa-trash" onclick="openConfirmDeleteModal(this)"></i>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    function showAlert(type, message) {
        const alertContainer = document.getElementById('alertContainer');
        alertContainer.innerHTML = `
            <div class="alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
    }

    function openConfirmDeleteModal(button) {
        const row = button.closest('tr');
        const studentId = row.querySelector('th').innerText;

        if (confirm(`Are you sure you want to delete student with ID ${studentId}?`)) {
            fetch('', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=delete&ID=${studentId}`
            })
            .then(response => response.json())
            .then(data => {
                showAlert(data.type, data.message);
                if (data.type === 'success') {
                    row.remove();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function searchById() {
        const input = document.getElementById('searchInput').value;

        fetch('', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=search&ID=${input}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.type === 'error') {
                showAlert(data.type, data.message);
            } else {
                const tableBody = document.querySelector('#studentTable tbody');
                const student = data.data;
                tableBody.innerHTML = `
                    <tr>
                        <th scope="row">${student.ID}</th>
                        <td>${student.FName}</td>
                        <td>${student.LName}</td>
                        <td>${student.Email}</td>
                        <td>${student.Status}</td>
                        <td class="operation-icons">
                            <i class="fas fa-eye" onclick="showStudentInfo(${student.ID})"></i>
                            <i class="fas fa-edit" onclick="editStudent(this)"></i>
                            <i class="fas fa-trash" onclick="openConfirmDeleteModal(this)"></i>
                        </td>
                    </tr>`;
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function editStudent(button) {
        const row = button.closest('tr');
        const studentId = row.querySelector('th').innerText;

        const firstName = prompt('Enter First Name:', row.children[1].innerText);
        const lastName = prompt('Enter Last Name:', row.children[2].innerText);
        const email = prompt('Enter Email:', row.children[3].innerText);
        const status = prompt('Enter Status:', row.children[4].innerText);

        fetch('', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ 
                action: 'edit', 
                ID: studentId, 
                FName: firstName, 
                LName: lastName, 
                Email: email, 
                Status: status 
            })
        })
        .then(response => response.json())
        .then(data => {
            showAlert(data.type, data.message);
            if (data.type === 'success') {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

</body>
</html>
