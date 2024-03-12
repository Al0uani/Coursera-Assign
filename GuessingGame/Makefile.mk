README.md: guessinggame.sh
    echo "# Guessing Game" > README.md
    echo "Make was run on: $$(date)" >> README.md
    echo "Number of lines in guessinggame.sh: $$(wc -l < guessinggame.sh)" >> README.md

.PHONY: clean
clean:
    rm README.md
