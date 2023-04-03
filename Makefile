.SILENT:

.PHONY: build
build:
	docker-compose build
	docker-compose run app composer update --ignore-platform-reqs -d /srv/app

.PHONY: run
run:
	docker-compose up

.PHONY: down
down:
	docker-compose down -v