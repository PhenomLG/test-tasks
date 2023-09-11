<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <table class="table table-bordered table-hover mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Математика</th>
            <th scope="col">Обж</th>
            <th scope="col">Физика</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data AS $student => $objects): ?>
            <tr>
                <th scope="row"><?= $student?></th>
                <td><?= $objects['Математика'] ?? '' ?></td>
                <td><?= $objects['ОБЖ'] ?? '' ?></td>
                <td><?= $objects['Физика'] ?? '' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>