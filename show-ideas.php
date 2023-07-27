<?php session_start();
    include('connect.php');

    // Checking if coming request is Post request
    $query  = $con->prepare("SELECT * FROM ideas");
    $query->execute();
    $ideas  = $query->fetchAll();
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
            <td rowspan="2" style="width:75%;height:300px">
                <div  style="height: 400px;overflow-y:scroll;">
                    <h3 style="text-align:right">الافكار والاقتراحات</h3>
                    <table style="text-align: right;width:100%" dir="rtl">
                        <!-- رأس الجدول -->
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الرقم الاكاديمي</th>
                            <th>رقم الطلب</th>
                            <th>الموضوع</th>
                            <th>الاقتراح / الفكرة</th>
                        </tr>
                        <!-- جسم الجدول -->
                        <?php foreach ($ideas as $idea):?>
                            <tr>
                                <td><?=$idea['id']?></td>
                                <td><?=$idea['name']?></td>
                                <td><?=$idea['academic_no']?></td>
                                <td><?=$idea['request_id']?></td>
                                <td><?=$idea['subject']?></td>
                                <td><?=$idea['idea']?></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
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