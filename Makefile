install:
	composer install

.gitignore:
	echo "vendor/" >> .gitignore

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

.PHONY: install brain-games
