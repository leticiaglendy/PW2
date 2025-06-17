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
        <h1> Dados dos Produtos </h1>
    </section>

    <section>
        <form action="" method="post">
            <div>
                <label> Pesquisar produto por nome: </label>
                <input type="text" name="txPesqNome" />                
            </div>

            <div>
                <input type="submit" value="Enviar" />
            </div>
        </form>
    </section>

    <section>
        <form action="/produto" method="post">
            @csrf

            <div>
                <label> Nome </label>
                <input type="text" name="txNome" />
            </div>

            <div>
                <label> Quantidade </label>
                <input type="text" name="txQuantidade" />
            </div>

            <div>
                <label> Descrição </label>
                <input type="text" name="txDescricao" />
            </div>

            <div>
                <label> Valor </label>
                <input type="text" name="txValor" />
            </div>

            <div>
                <label> Data de Cadastro </label>
                <input type="text" name="txCadastro" />
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
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data de Cadastro</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($produtos as $p)
                    <tr>
                        <th scope="row"> {{$p->id_produto}} </th>
                        <td> {{$p->nome_produto}} </td>
                        <td> {{$p->quantidade}} </td>
                        <td> {{$p->descricao}} </td>
                        <td> {{$p->valor}} </td>
                        <td> {{$p->data_cadastro}} </td>
                    </tr>
                @endforeach               
            </tbody>
        </table>
    </section>


    <footer>

    </footer>
    
</body>
</html>