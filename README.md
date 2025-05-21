# Welcome on the site created to learn PHP basics

**Pourquoi `$_POST['names']['gants'] = "Gants"` ?**

### Réponse :

Cette affectation vient de la **génération dynamique du formulaire HTML** à partir du tableau PHP `$products`.

---

### 1. **Structure du tableau `$products`**

```php
$products = [
    "gants" => [
        "name" => "Gants",
        ...
    ],
    ...
];
```

Ici :

* `"gants"` est la **clé** du produit dans le tableau associatif.
* `"Gants"` (avec une majuscule) est la valeur de `$products['gants']['name']`.

---

### 2. **Génération du champ `input hidden`**

Dans la boucle `foreach` :

```php
foreach ($products as $key => $product)
```

* `$key` vaut `"gants"` (ou une autre clé selon l'itération).
* `$product` vaut `$products['gants']`, donc le tableau associatif du produit en question.

La ligne :

```php
<input type="hidden" name="names[<?= $key ?>]" value="<?= $product['name'] ?>">
```

devient alors (après substitution PHP) :

```html
<input type="hidden" name="names[gants]" value="Gants">
```

---

### 3. **Résultat lors de l’envoi du formulaire**

Quand ce formulaire est soumis :

* Le champ `name="names[gants]"` envoie la valeur `"Gants"` dans `$_POST`.

Donc tu obtiens :

```php
$_POST['names']['gants'] = "Gants";
```

---

### Conclusion

`$_POST['names']['gants'] = "Gants"` parce que :

* `"gants"` est la **clé** dans le tableau `$products`,
* `"Gants"` est la **valeur** de `$products['gants']['name']`,
* PHP les utilise pour générer un champ de formulaire HTML de type `hidden`,
* Et ce champ est envoyé quand on soumet le formulaire.
