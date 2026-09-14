# drtalk Redesign Theme

## Installation

Install both locked dependency sets before activating or deploying the theme:

```sh
composer install --no-dev --optimize-autoloader
npm ci
npm run build
```

Carbon Fields is installed through Composer. If its runtime is missing, the public theme remains available, while WordPress administrators receive an error notice and the problem is written to the PHP log.

## Checks

```sh
npm run test:calculator
npm run test:home-blocks
npm run format:check
npm run build
```
