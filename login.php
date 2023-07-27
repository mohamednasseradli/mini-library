<?php session_start();
    include('connect.php');

    // Checking if coming request is Post request
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // Getting form data
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $hashedPass = sha1($password);

        // Checking if data is in database
        $query = $con->prepare("SELECT * FROM admins WHERE username = '$username' AND password = '$hashedPass'");
        $query->execute();
        $result = $query->fetch();

        if ($result)
        {
            $_SESSION['logged-in'] = true;
            header('location:index.php');
        } else {

            $error  = 'بيانات دخول غير صحيحة';
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
                        <form action="" method="post" style="text-align: right;">
                            <h2 >تسجبل الدخول</h2>
                            <!-- Error Message -->
                            <?php if (isset($error)):?>
                                <?=$error?>
                            <?php endif;?>
                            <br>
                            <label class="mb-3" for="username">اسم المستخدم</label>
                            <br>
                            <input type="text" id="username" name="username" required>
                            <br>
                            <label class="mb-3" for="password">كلمة المرور</label>
                            <br>
                            <input type="password" id="password" name="password"  required >
                            <br>
                            <input type="submit" value="دخول" name="login" >
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