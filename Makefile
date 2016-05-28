install:
	composer install

autoload:
	composer dump-autoload

test:
	composer exec phpunit -- -c phpunit.xml
	./vendor/bin/test-reporter

lint:
	composer exec 'phpcs --standard=PSR2 src tests'
