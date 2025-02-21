#!/bin/bash

cd ..

sudo cp -r xups2 /usr/local/bin/

sudo chmod +x "/usr/local/bin/xups2/xups.sh"

alias xups='/usr/local/bin/xups2/xups.sh'

echo "alias xups='/usr/local/bin/xups2/xups.sh'" >> ~/.bashrc

echo "instalando..."

sleep 5

source ~/.bashrc

echo "instalado!".\n" digite xups para iniciar. "