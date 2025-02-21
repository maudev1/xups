#!/bin/bash

mode="freex"

parse() {
    php index.php "${mode}" "$1"
}

command=""

echo "Fala Xamps?"

while true; do
    read -p "> " command

    if [ "$command" == "sair" ]; then
        echo "Flw!"
        kill -SIGINT $$
    fi

    if [ "$command" == "superx" ]; then
        mode="superx"
    fi

    if [ "$command" == "freex" ]; then
        mode="freex"
    fi

    parse "$command"
done
