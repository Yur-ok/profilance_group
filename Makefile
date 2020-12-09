setup:create_project run_migrate run_local_serve

setup_my_db: create_project run_migrate

dev: run_local_serve

create_project:
	composer create-project
run_migrate:
	php artisan migrate
run_local_serve:
	php artisan serve

.PHONY: test app
