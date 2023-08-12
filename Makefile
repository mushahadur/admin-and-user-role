setup:
	@make build
	@make up 
	@make composer-update
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec multiple_rule bash -c "composer update"
data:
	docker exec multiple_rule bash -c "php artisan migrate"
	docker exec multiple_rule bash -c "php artisan db:seed"
art:
	docker exec multiple_rule bash -c "php artisan $(var)"
fstart:
	git flow feature start $(var)
fpub:
	git flow feature publish $(var)
root-bash:
	docker exec -it multiple_rule bash
