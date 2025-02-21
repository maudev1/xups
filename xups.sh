#!/bin/bash

mode="freex"

parse() {
    php index.php "${mode}" "$1"
}

command=""


alias=("diga:" "Fala Xamps?" "Fala comigo bb?" "fala meu filho:" "fala ai jovem:" "Chora criança:")
random_alias=${alias[RANDOM % ${#alias[@]}]}

echo "$random_alias"

while true; do
    read -p "> " command

    if [ "$command" == "sair" ]; then
        echo "Flw!"
        kill -SIGINT $$
    fi

    parse "$command"
done
