install:
	@docker-compose up -d php && docker-compose exec php bash -c "composer install"
up:
	@docker-compose up -d db && sleep 6 && docker-compose up -d php && docker-compose exec php bash -c "yii migrate"
	@docker-compose up -d php-worker