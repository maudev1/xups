#!/bin/bash

consulta() {
    php xups.php "$1"
}

command=""

echo "Fala Xamps?"

while true; do
    read -p "> " command

    if [ "$command" == "sair" ]; then
        echo "Flw!"
        kill -SIGINT $$
    fi

    consulta "$command"
done
