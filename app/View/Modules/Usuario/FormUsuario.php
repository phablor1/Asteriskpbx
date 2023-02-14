<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
    <style>
        label, input { display: block; }
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro de Usuario</legend>

        <form method="post" action="/usuario/form/save">

            <input type="hidden" value="<?= $model->$id?>" name="id" />
            
            <label for="usuario">Usuario:</label>
            <input id="usuario" name="usuario" value="<?= $model->$usuario ?>" type="text" />

            <label for="nome">Nome:</label>
            <input id="nome" name="nome" value="<?= $model->$nome ?>" type="text" />

            <label for="email">Email:</label>
            <input id="email" name="email" value="<?= $model->$email ?>" type="text" />
                       
            <button type="submit">Salvar</button>
        </form>
    </fieldset>

    
</body>
</html>