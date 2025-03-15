APP_NAME=product-service
COMPOSE_FILE=.docker/docker-compose.yaml
DOCKER_IMAGE=product-service
TAG=latest


.PHONY: help
help:
	@echo "Available commands:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

.PHONY up:
up:
	docker-compose -f $(COMPOSE_FILE) up --build -d

.PHONY down:
down:
	docker-compose -f $(COMPOSE_FILE) down -v

.PHONY restart:
restart:
	docker-compose -f $(COMPOSE_FILE) down -v && docker-compose -f $(COMPOSE_FILE) up --build -d

.PHONY build:
build:
# DO NOTHING

.PHONY test:
test:
# DO NOTHING