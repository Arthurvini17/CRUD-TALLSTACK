  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <title>Usuario</title>

    <h2>Usuarios</h2>

    <table style="border-collapse: collapse; width:100%">
        <thead>
            <tr style="border-collapse: collapse; width: 100%"">
                <th style="background-color:  #adb5bd">ID</th>
                <th style="background-color:  #adb5bd">Nome</th>
                <th style="background-color:  #adb5bd">Email</th>
                <th style="background-color:  #adb5bd">Data nascimento</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td style="border: 1px solid #ccc; border-top:none">{{$funcionario->id}}</td>
                    <td style="border: 1px solid #ccc; border-top:none">{{$funcionario->name}}</td>
                    <td style="border: 1px solid #ccc; border-top:none">{{$funcionario->email}}</td>
                    <td style="border: 1px solid #ccc; border-top:none">{{\Carbon\Carbon::parse($funcionario->date)->tz('America/Sao_Paulo')->format('d/m/Y')}}</td>


                </tr>
            @empty
            <tr>
                <td colspan="4">Nenhum usuario encontrado</td>

            </tr>
            @endforelse
        </tbody>
    </table>

  </body>
  </html>
   