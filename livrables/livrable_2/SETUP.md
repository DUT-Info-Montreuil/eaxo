##  Notice
### Prérequis

* PHP >= 7.4
* MySQL >= 5.7

### Installation
##### Exécutez les commandes ci-dessous
```
cd {REPERTOIRE_APACHE}
git clone https://github.com/DUT-Info-Montreuil/eaxo.git

mysql -u root
CREATE DATABASE eaxo;
CREATE USER 'eaxo'@'localhost' IDENTIFIED BY 'PASSWORD'; 
GRANT ALL PRIVILEGES ON eaxo.* TO 'eaxo'@'localhost';
FLUSH PRIVILEGES;
source {REPERTOIRE_APACHE}\eaxo\db.sql
\q

```
###### Changez les identifiants de connexion.php
```php
<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $id = "eaxo";
        $dbname = "eaxo";
        $mdp = "MDP";
        $adress = "localhost";
        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }

}
?>
```

