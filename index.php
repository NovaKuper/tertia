<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Тестовое задание</title>
</head>
<body>
<div class="container">
    <div class="row mt-3 ">
        <form class="mx-auto" id="add_form">
            <div class="form-group">
                <input type="text" class="form-control" id="prod" name="prod" placeholder="Производитель" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Наименование" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="price" name="price" placeholder="Цена" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="amt" name="amt" placeholder="Количество" required>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
    <div class="row mt-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Производитель</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
            </tr>
            </thead>
            <tbody id="table_cont">

            </tbody>
        </table>

    </div>
</div>
<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>