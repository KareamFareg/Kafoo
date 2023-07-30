

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/pdf.css')); ?>">

</head>
<body  style="font-family: XB Riyaz ;direction:rtl ">
    
<table class="">
    <tr>
        <td>
            <img style="width: 500px !important; height: auto !important;"
                src="<?php echo e(asset('storage/app/'.\App\Models\Setting::first()->logo)); ?>">
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $data; ?>

        </td>
    </tr>
</table>
</body>
</html><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/components/pdf.blade.php ENDPATH**/ ?>