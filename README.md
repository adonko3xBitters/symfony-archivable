# Symfony Archivable

A lightweight Symfony package that provides a reusable `Archivable` trait and a Doctrine filter to automatically exclude archived entities from queries.


## 📦 Installation

Install the package via Composer:

```bash
composer require adonko3xBitters/symfony-archivable
```
    
## Features

- Easily mark entities as archived using a single trait.
- Automatically exclude archived records from Doctrine queries.
- Enable or disable the filter at runtime.


## Usage/Examples

#### 1. Use the ```Archivable``` trait in your entities

```php
use YourVendor\SymfonyArchivable\Archivable;

#[ORM\Entity]
class Article
{
    use Archivable;

    // other properties...
}
```

#### 2. Register the Doctrine filter in your configuration
In ```config/packages/doctrine.yaml```:

```yaml
doctrine:
    orm:
        filters:
            archived:
                class: adonko3xBitters\SymfonyArchivable\Doctrine\ArchivedFilter
                enabled: true
```

#### 3. Archive an entity
To archive an entity, simply set the ```archivedAt``` property:

```php
$article->setArchivedAt(new \DateTimeImmutable());
$entityManager->flush();
```

#### 4. Doctrine queries will exclude archived entities by default
The filter automatically applies ```archived_at IS NULL``` to all entities using the Archivable trait.

#### 5. Disable the filter manually (when needed)
If you want to include archived entities in a specific query:

```php
$entityManager = $this->getDoctrine()->getManager();
$entityManager->getFilters()->disable('archived');

// perform query including archived entities...

$entityManager->getFilters()->enable('archived');
```
## Directory Structure

```css
src/
├── Archivable.php
└── Doctrine/
    └── ArchivedFilter.php
```
## License

This package is open-sourced software licensed under the [MIT](https://choosealicense.com/licenses/mit/) license.

---
## Authors

- [@adonko3xBitters](https://https://github.com/adonko3xBitters)

