set PGUSER=postgres
set PGPASSWORD=postgres

"C:\Program Files\PostgreSQL\12\bin\pg_dump" -h localhost -p 5432 -U postgres --inserts -c -f C:\backups\padaria.bak padaria

"C:\Program Files\PostgreSQL\12\bin\dropdb" -U postgres padaria

"C:\Program Files\PostgreSQL\12\bin\createdb" -U postgres padaria

"C:\Program Files\PostgreSQL\12\bin\psql" -U postgres -d padaria -f C:\backups\padaria.bak