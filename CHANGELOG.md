# CHANGELOG

## Unreleased
- Allow Symfony 8, drop Symfony < 7.4, and remove the test scenarios tooling (`g-1-a/composer-test-scenarios`, `.travis.yml`)

## 2.1.0
- Require PHP 8.4 and allow Symfony 7 components
- Extend `Symfony\Component\DependencyInjection\Extension\Extension` instead of the HttpKernel one
- Upgrade PHPUnit to 13: `phpunit.xml.dist` rewritten, tests use attributes and `expectException()`

## 1.0.0
- upgrade twig version

## 0.0.1
- Fork repo from official package