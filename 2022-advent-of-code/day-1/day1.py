"""For the day 1 advent of code challenge in 2022"""
# Opening the file and storing it in a variable
file = open("day1-snippet.txt", "r")
# Making lines variable an array of the lines
lines = file.readlines()

highscore = 0

# for line in lines: "For every line: create a line variable for that position in the array"
#     print(line.strip()) # Strip removes the extra line breaks that python adds

for line in lines:
    line = line.strip()

    if line == '':
        print("New Elf")
    else:
        print(line)
        