#!/bin/bash

cd ..

sudo cp -r xamps /usr/local/bin/

sudo chmod +x "/usr/local/bin/xamps/xamps.sh"

alias xamps='/usr/local/bin/xamps/xamps.sh'

echo "alias xamps='/usr/local/bin/xamps/xamps.sh'" >> ~/.bashrc

echo "instalando..."

sleep 5

source ~/.bashrc

echo "instalado!".\n" digite xamps para iniciar. "