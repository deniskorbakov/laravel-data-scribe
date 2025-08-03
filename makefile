# command for init project
init: build install

# command for start app
up:
	docker compose up -d

# command for build app
build:
	docker compose up -d --build

# command for exec in app container
exec:
	docker exec -it scribe-plugin /bin/sh

# command for install composer
install:
	docker exec -i scribe-plugin composer install --dev

# command for run lint code
lint:
	docker exec -i scribe-plugin composer lint

# command for run tests
test:
	docker exec -i scribe-plugin composer tests

# command for run tests coverage
test-coverage:
	docker exec -i scribe-plugin composer tests-coverage

# command for run tests mutation
test-mutation:
	docker exec -i scribe-plugin composer tests-mutation
