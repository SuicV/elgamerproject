<!doctype html>
<html lang="fr"  style="width: 21cm;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="http://www.el-gamer.com/css/pdf.css" rel="stylesheet"/>
</head>
<body>
    <header style="padding-left: 1.5cm;">
        <h1 style="font-family: 'Press Start 2P', cursive; color: #0E3E61; float:right; margin:0;padding:0;" >El-gamer</h1>
        <address style="float:left; padding-bottom: 15px; margin:0;">
            <h3 style="font-family: Roboto; margin:0; padding:0;">Marrakech</h3>
            <p>Boulevard Abde El-Karim El-Khatabi</p>
            <p>FSTG</p>
        </address>
        <div style="clear:both; dispaly:none;"></div>
    </header>
    <section>
        <aside>
            <ul style="padding-top:0;">
                <li><span>Code De Commande :</span>{{$commandeCode}}</li>
                <li><span>Nom de Client :</span> {{$client->fullName}}</li>
                <li><span>Email :</span> {{$client->email}}</li>
                <li><span>telephone :</span> {{$client->phone}}</li>
                <li><span>adresse :</span> {{$client->address}}</li>
                <li><span>date :</span> {{$client->created_at}}</li>
            </ul>
        </aside>
    </section>
    <section>
        <header>
            <h3>Produits Commandé</h3>
        </header>
        <article>
            <table class="table">
                <thead>
                    <tr>
                        <td>Produits</td>
                        <td>Nom</td>
                        <td>Prix unitaire</td>
                        <td>Quantité</td>
                        <td>Prix total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><img class="img-fluid" style="height: 150px;" src="http://el-gamer.com/imgs/{{$product->image}}" /></td>
                            <td style="vertical-align: middle;">{{$product->title}}</td>
                            <td style="vertical-align: middle;">{{$product->getPrice()}}</td>
                            <td style="vertical-align: middle;">{{$quantities[$product->id]}}</td>
                            <td style="vertical-align: middle;">{{$product->getPrice() * $quantities[$product->id]}}</td>
                        </tr>
                        @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td style="text-align: right;" colspan="4">Montant Total a payé</td>
                    <td>{{$quantities["totalPrice"]}}</td>
                </tr>
                </tfoot>
            </table>
        </article>
    </section>
    <footer>
        <h4 style="text-align: center;">El-Gamer store vous remercie pour votre confiance</h4>
    </footer>

</body>
</html>
