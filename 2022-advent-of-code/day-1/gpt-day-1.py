# Initialize variables to track the max Calories and the Elf carrying them
max_calories = 0
max_calories_elf = 0
current_calories = 0

# Read input from file
with open("day1.txt", "r") as file:
    for line in file:
        line = line.strip()  # Remove leading and trailing whitespaces
        if not line:
            # Update max_calories and max_calories_elf when encountering a blank line
            if current_calories > max_calories:
                max_calories = current_calories
                current_calories = 0
        else:
            # Sum up the Calories for the current Elf
            current_calories += int(line)

# Check one more time after the loop in case the last Elf has the most Calories
if current_calories > max_calories:
    max_calories = current_calories

print("The Elf carrying the most Calories is carrying a total of:", max_calories, "Calories")
