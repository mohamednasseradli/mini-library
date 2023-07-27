<?php session_start();
    include('connect.php');

    // Checking if coming request is Post request
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (isset($_POST['inquiry']))
        {
            $academic_no    = $_POST['academic_no'];
            // جلب الكتب المستعارة
            $query = $con->prepare("SELECT * FROM borrow_book WHERE academic_no = '$academic_no'");
            $query->execute();
            $books  = $query->fetchAll();

        }
        
        if (isset($_POST['restore']))
        {
            $academic_no    = $_POST['academic_no'];
            $book_no        = $_POST['book_no'];

            $query2         = $con->prepare("DELETE FROM borrow_book WHERE academic_no = '$academic_no' AND book_no = '$book_no'");
            $query2->execute();
            $success = "تم إلغاء عملية الاستعارة بنجاح";
            header('refresh:2');
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
                    <!-- Inquiry -->
                    <form action="" method="post" style="text-align: right;padding:10px">
                        <label for="user_academic_no">الرقم الاكاديمي</label>
                        <br>
                        <br>
                        <input type="text" name="academic_no" >
                        <br>
                        <br>
                        <input type="submit" name="inquiry" value="استعلام">
                    </form>
                    
                    <!-- الكتب المستعارة -->
                    <?php if (isset($books) && !empty($books)): ?>
                    <table style="width: 100%;text-align:right">
                        <!-- رأس الجدول -->
                        <tr>
                            <th>#</th>
                            <th>اسم الكتاب</th>
                            <th>رقم الكتاب</th>
                            <th>التاريخ</th>
                            <th>استرجاع</th>
                        </tr>
                        <!-- جسم الجدول -->
                        <?php foreach($books as $book):?>]
                            <tr>
                                <td scope="row"><?=$book['id']?></td>
                                <td><?=$book['book_name']?></td>
                                <td><?=$book['book_no']?></td>
                                <td><?=$book['date']?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="book_no" value="<?=$book['book_no']?>">
                                        <input type="hidden" name="academic_no" value="<?=$book['academic_no']?>">
                                        <input type="submit" name="restore" value="استرجاع">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                <?php endif;?>
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