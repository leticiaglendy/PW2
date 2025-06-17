<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header> 
        
    </header>

    <section>
        <h1> Dados das Categorias </h1>
    </section>

    <section>
        <form action="" method="post">
            <div>
                <label> Pesquisar categoria por nome: </label>
                <input type="text" name="txPesqNome" />                
            </div>

            <div>
                <input type="submit" value="Enviar" />
            </div>
        </form>
    </section>


    <section>
        <form action="/categoria" method="post">
            @csrf

            <div>
                <label> Nome </label>
                <input type="text" name="txNome" />
            </div>

            <div>
                <label> Descrição </label>
                <input type="text" name="txDescricao" />
            </div>

            <div>
                <input type="submit" value="Enviar" />
            </div>

        </form>
    </section>

    <section>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($categorias as $c)
                    <tr>
                        <th scope="row"> {{$c->id_categoria}} </th>
                        <td> {{$c->nome_categoria}} </td>
                        <td> {{$c->descricao}} </td>
                    </tr>
                @endforeach               
            </tbody>
        </table>
    </section>

    <footer>

    </footer>
    
</body>
</html>