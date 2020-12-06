#!/usr/bin/env bash
echo "php-cs-fixer pre commit hook start"

PHP_CS_FIXER="vendor/bin/php-cs-fixer"
PHP_CS_CONFIG=".php_cs"
CHANGED_FILES=$(git diff --cached --name-only --diff-filter=ACM -- '*.php')

if [ -n "$CHANGED_FILES" ]; then
    $PHP_CS_FIXER fix --config "$PHP_CS_CONFIG" $CHANGED_FILES;
    git add $CHANGED_FILES;
fi

echo "php-cs-fixer pre commit hook finish"
