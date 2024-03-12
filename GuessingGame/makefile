.PHONY: all clean

# Main target to generate README.md
all: README.md

# Rule to generate README.md
README.md: guessinggame.sh
	@echo "# Guessing Game" > README.md
	@echo "## Project Information" >> README.md
	@echo "Make was run on: $$(date)" >> README.md
	@echo "Number of lines in guessinggame.sh: $$(wc -l < guessinggame.sh)" >> README.md
	@echo "## Project Description" >> README.md
	@echo "This project is a guessing game implemented in Bash." >> README.md
	@echo "The game prompts the user to guess the number of files in the current directory." >> README.md
	@echo "## Instructions" >> README.md
	@echo "To play the game, run the following command in your terminal:" >> README.md
	@echo "\`bash guessinggame.sh\`" >> README.md
	@echo "## License" >> README.md
	@echo "This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details." >> README.md

# Clean target to remove generated files
clean:
	@rm -f README.md
