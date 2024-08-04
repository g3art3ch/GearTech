<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <label for="">
            <select name="" id="">
                <?php 
                    for ($i = 0; $i < 4; $i++) {
                        echo '<option value="">'. $i .'</option>';
                    }
                ?>
            </select>
        </label>
    
    </form>
</body>
</html>