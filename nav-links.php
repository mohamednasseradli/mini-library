
<ul id="nav-links" style="text-align: right;padding: 10px;font-weight: bold;">
    <li><a href="index.php">الصفحة الرئيسية</a></li>
    <li><a href="about.php">مقدمة عن المكتبة</a></li>
    <li><a href="gallery.php">صور المكتبة</a></li>
<!-- Loged In -->
<?php if (isset($_SESSION['logged-in'])):?>
    <li><a href="register.php">التسجيل</a></li>
    <li><a href="users.php">المسجلين</a></li>
    <li><a href="borrow-book.php">استعارة كتاب</a></li>
    <li><a href="restore-book.php">استرجاع كتاب</a></li>
    <li><a href="show-ideas.php">عرض الافكار والاقتراحات</a></li>
    <li><a href="logout.php">تسجبل الخروج</a></li>
<?php else:?>
    <li><a href="login.php">تسجيل الدخول</a></li>
<?php endif;?>
    <li><a href="ideas-suggestions.php">الأفكار والاقتراحات</a></li>
</ul>
