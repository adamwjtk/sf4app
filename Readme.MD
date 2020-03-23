php unit run [windows]
```bash
php bin/phpunit
```

code sniffer run [windows]

```bash
php vendor/squizlabs/php_codesniffer/bin/phpcs -p
```
repair command [windows]

```bash
php vendor/squizlabs/php_codesniffer/bin/phpcbf
```

load DB data

```bash
php bin/console doctrine:migrations:migrate -e docker
php bin/console doctrine:fixture:load -e docker
```