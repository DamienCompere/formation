USERNAME='root'
PASSWORD='root'
DBNAME='formation'
HOST='localhost'

USER_USERNAME='damien'
USER_PASSWORD='damien'

MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and host='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)

echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

php artisan migrate:refresh --seed