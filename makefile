docker_make_database:
	docker run --name intelogis_postgress_db -e POSTGRES_PASSWORD=intelogis -e POSTGRES_USER=intelogis -e POSTGRES_DB=intelogis -v "./db/data:/var/lib/postgresql/data" -p "5432:5432" -d -it postgres

docker_start_db:
	docker start intelogis_postgress_db

docker_stop_db:
	docker stop intelogis_postgress_db
