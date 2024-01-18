install:
	composer install

.gitignore:
	echo "vendor/" >> .gitignore

brain-games:
	. bin/brain-games

validate:
	composer validate

.PHONY: install brain-games
