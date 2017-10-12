<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>HTML</title>
    <style>
        .table{
            border:2px solid black;
            padding: 10px;
            margin-top: 10px;
            margin-left: 10px;
            float: left;
        }
    </style>
</head>
<body>

<?if(isset($data['id'])):?>
    <table class="table">
        <tr class="success">
            <td>ID:</td>
            <td><?=$data['id']?></td>
        </tr>
        <tr class="success">
            <td>Brand:</td>
            <td><?=$data['brand']?></td>
        </tr>
        <tr class="success">
            <td>Model:</td>
            <td><?=$data['model']?></td>
        </tr>
        <tr class="success">
            <td>Color:</td>
            <td><?=$data['color']?></td>
        </tr>
        <tr class="success">
            <td>Year:</td>
            <td><?=$data['year']?></td>
        </tr>
        <tr class="success">
            <td>Engine:</td>
            <td><?=$data['engine']?></td>
        </tr>
        <tr class="success">
            <td>Price:</td>
            <td><?=$data['price']?></td>
        </tr>
        <tr class="success">
            <td>Max Speed:</td>
            <td><?=$data['maxSpeed']?></td>
        </tr>
    </table>
<?else:?>
    <?php
    foreach($data as $value):?>
        <table class="table">
            <tr class="success">
                <td>ID:</td>
                <td><?=$value['id']?></td>
            </tr>
            <tr class="success">
                <td>Brand:</td>
                <td><?=$value['brand']?></td>
            </tr>
            <tr class="success">
                <td>Model:</td>
                <td><?=$value['model']?></td>
            </tr>
            <tr class="success">
                <td>Color:</td>
                <td><?=$value['color']?></td>
            </tr>
            <tr class="success">
                <td>Year:</td>
                <td><?=$value['year']?></td>
            </tr>
            <tr class="success">
                <td>Engine:</td>
                <td><?=$value['engine']?></td>
            </tr>
            <tr class="success">
                <td>Price:</td>
                <td><?=$value['price']?></td>
            </tr>
            <tr class="success">
                <td>Max Speed:</td>
                <td><?=$value['maxSpeed']?></td>
            </tr>
        </table>
    <?endforeach;?>
<?endif;?>

</body>
</html>
<?php


