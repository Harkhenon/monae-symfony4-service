# Mon Auto Entreprise - MonAE


Ce service pour symfony 4 vous permettras d'utiliser l'endpoint de Monae de manière simple via des méthodes faciles à retenir.

Il suffit de le charger comme tout service:

```php
use App\Service\Monae;

$monae = news Monae();
```

/!\ ATTENTION /!\

Il vous faut préparer votre objet JSON __avant__ de l'envoyer à la méthode d'insert ou d'update

La liste des clés est ici => https://www.facturation.pro/api-webservice-facturation

La préparation est relativement simple, associez les clés correspondantes à vos résultats dans un array, faites un bon vieux:

```php
$json = json_encode($votreVariable);

// Puis

$monae->createCustomer($json);
```

<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SXKGHU5NGMM2Y&source=url">
  <img src="https://i2.wp.com/www.penstrokes.co.ke/wp-content/uploads/2018/09/PayPal.png?fit=100%2C50&ssl=1" />
</a>


# Mon Auto Entreprise - MonAE

This service for Symfony 4 will enable you to use Monae endpoint simply via easy2learn methods

You juste need to charge it like another service:

```php
use App\Service\Monae;

$monae = news Monae();
```

/!\ WARNING /!\

You need to prepare your JSON object __before__ sending it to insert or update methods.

There is a list of available keys: https://www.facturation.pro/api-webservice-facturation

Preparing is easy, you juste need to bind Monae keys to your results in an array, do a simple:


```php
$json = json_encode($votreVariable);

// Puis

$monae->createCustomer($json);
```
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SXKGHU5NGMM2Y&source=url">
  <img src="https://i2.wp.com/www.penstrokes.co.ke/wp-content/uploads/2018/09/PayPal.png?fit=100%2C50&ssl=1" />
</a>


