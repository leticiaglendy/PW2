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
        <h1> Dados dos Contatos </h1>
    </section>

    <section>
        <form action="" method="post">
            <div>
                <label> Pesquisar contato por nome: </label>
                <input type="text" name="txPesqNome" />                
            </div>

            <div>
                <input type="submit" value="Enviar" />
            </div>
        </form>
    </section>

    <section>
        <form action="/contato" method="post">
            @csrf

            <div>
                <label> Nome </label>
                <input type="text" name="txNome" />
            </div>

            <div>
                <label> E-mail </label>
                <input type="text" name="txEmail" />
            </div>

            <div>
                <label> Telefone </label>
                <input type="text" name="txTelefone" />
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
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefone</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($contatos as $ct)
                <tr>
                    <th scope="row"> {{$ct->id_contato}} </th>
                    <td> {{$ct->nome}} </td>
                    <td> {{$ct->email}} </td>
                    <td> {{$ct->telefone}} </td>
                </tr>
            @endforeach       
            </tbody>
        </table>
    </section>

    <footer>

    </footer>
    
</body>
</html>