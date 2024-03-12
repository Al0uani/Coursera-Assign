#!/bin/bash

function guessing_game {
    local num_files=$(ls -l | grep "^-" | wc -l)
    local guess=-1

    while [[ $guess -ne $num_files ]]; do
        read -p "How many files are in the current directory? " guess

        if [[ $guess -lt $num_files ]]; then
            echo "Too low!"
        elif [[ $guess -gt $num_files ]]; then
            echo "Too high!"
        else
            echo "Congratulations! You guessed correctly!"
        fi
    done
}

guessing_game
