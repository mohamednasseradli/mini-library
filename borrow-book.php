<?php session_start();
    include('connect.php');

    // Checking if coming request is Post request
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // Getting form data
        $request_no     = $_POST['request_no'];
        $academic_no    = $_POST['academic_no'];
        $name           = $_POST['name'];
        $book_no        = $_POST['book_no'];
        $book_name      = $_POST['book_name'];

        // Checking if data is in database
        $query = $con->prepare("INSERT INTO borrow_book (academic_no, name, book_no, request_no, book_name)
                                VALUES ('$academic_no', '$name', '$book_no', '$request_no', '$book_name')");
        $insert = $query->execute();
        

        if ($insert)
        {
            $success  = 'تم تسجيل الاستعارة بنجاح';
            header('refresh:2');
        } else {

            $error  = 'برجاء ادخال كافة البيانات';
        }

    }
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>مكتبة كلية التقنية بالخرج</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <table width="600" border="1"  height="600" align="center" style='margin:auto;background-image:url("imgs/GG.jpg")'>
        <!-- رأس الجدول -->
        <tr>
                <th colspan="2">
                    <img src="imgs/hr.jpg" title="موقع المكتبة" width="790pt" height="200" style="float:center;">
                </th>
            </tr>
        <!-- جسم الجدول -->
            <tr>
                <!-- Content -->
                <td rowspan="2" style="width:75%;overflow:scroll;height:300px">
                    <div style="height: 400px;overflow-y:scroll;">
                        
                        <!-- Error Message -->
                        <?php if (isset($error)) {
                                echo $error;
                        } if (isset($success)){
                            echo $success;
                        } ?>

                        <form action="" method="post" style="text-align: right;padding:10px">
                            <label class="mb-3" for="academic_no">الرقم الأكاديمي</label>
                            <br>
                            <input type="text" id="academic_no" name="academic_no" required >
                            <br>
                            <br>
                            <label class="mb-3" for="name">الاسم الثلاثي</label>
                            <br>
                            <input type="text" id="name" name="name" required >
                            <br>
                            <br>
                            <label class="mb-3" for="request_no">رقم الطلب</label>
                            <br>
                            <input type="text" id="request_no" name="request_no" required >
                            <br>
                            <br>
                            <label class="mb-3" for="book_no">رقم الكتاب</label>
                            <br>
                            <input type="text" id="book_no" name="book_no" required >
                            <br>
                            <br>
                            <label class="mb-3" for="book_name">اسم الكتاب</label>
                            <br>
                            <input type="text" id="book_name" name="book_name" required>
                            <br>
                            <br>
                            <input type="submit" value="استعارة" name="register" >
                        </form>
                    </div>
                </td>
                <!-- Sidebar -->
                <td style="width:25%">
                    <?php include('nav-links.php')?>
                </td>
            </tr>
            <tr>
                <td  style="text-align: center;padding:20px">
                    <a href="https://lms.elearning.edu.sa/">بلاك بورد</a>
                    <a href="https://tvtc.gov.sa/ar/Departments/tvtcdepartments/Rayat/Pages/default.aspx">رايات</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;padding:20px">
                    <a href="https://tvtc.gov.sa/ar/Pages/default.aspx">موقع موسسة العامة للتدريب التقني والمهني</a>
                </td>
            </tr>
    </table>
    <script src="script.js"></script>

</body>
</html>