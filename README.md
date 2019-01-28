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




