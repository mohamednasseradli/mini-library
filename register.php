<?php session_start();
    include('connect.php');

    // Checking if coming request is Post request
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // Getting form data
        $academic_no    = $_POST['academic_no'];
        $name           = $_POST['name'];
        $speciality     = $_POST['speciality'];
        $phone          = $_POST['phone'];
        $email          = $_POST['email'];

        // Checking if data is in database
        $query = $con->prepare("INSERT INTO users (academic_no, name, speciality, phone, email)
                                VALUES ('$academic_no', '$name', '$speciality', '$phone', '$email')");
        $insert = $query->execute();
        

        if ($insert)
        {
            $success  = 'تم التسجيل بنجاح';
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
                <div  style="height: 400px;overflow-y:scroll;">
                        <!-- Error Message -->
                        <?php if (isset($error)) {
                                echo $error;
                        } if (isset($success)){
                            echo $success;
                        } ?>
                    <form action="" method="post"  style="text-align:right">
                        <label class="mb-3" for="academic_no">الرقم الأكاديمي</label>
                        <br>
                        <input type="text" id="academic_no" name="academic_no" class="form-control" required >
                        <br>
                        <label class="mb-3" for="name">الاسم الثلاثي</label>
                        <br>
                        <input type="text" id="name" name="name" class="form-control" required>
                        <br>
                        <label class="mb-3">التخصص</label>
                        <br>
                            <span>
                                <label for="computer">حاسب آلي</label>
                                <input type="radio" id="computer"  value="computer" name="speciality" required>
                            </span>
                            <span>
                                <label for="electricity">كهربية</label>
                                <input type="radio" id="electricity"  value="electricity" name="speciality" required>
                            </span>
                            <span>
                                <label for="accounting">محاسبة</label>
                                <input type="radio" id="accounting"  value="accounting" name="speciality" required>
                            </span>
                            <span>
                                <label for="electronics">الكترونيات</label>
                                <input type="radio" id="electronics"  value="electronics" name="speciality" required>
                            </span>
                            <span>
                                <label for="mechanics">ميكانيكا</label>
                                <input type="radio" id="mechanics"  value="mechanics" name="speciality" required>
                            </span>
                            <span>
                                <label for="library-mangement">ادارة مكتبية</label>
                                <input type="radio" id="library-mangement" value="library-management" name="speciality" required>
                            </span>
                        <label class="mb-3" for="phone">رقم التواصل</label>
                        <br>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                        <br>
                        <label class="mb-3" for="email">الايميل</label>
                        <br>
                        <input type="text" id="email" name="email" class="form-control" required >
                        <br>
                        <input type="submit" value="تسجيل" name="register" class="btn bg-white border">
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