# Opening the file and storing it in a variable
file = open("day2.txt", "r")
# Making lines variable an array of the lines
lines = file.readlines()

# Define constants
WIN = 6
LOSE = 0
DRAW = 3
ROCK = 1 #A, X
PAPER = 2 # B, Y
SCISSORS = 3 # C, Z 

# Define functions

# Input the line and calculate the points that you would get from a win, loss, or draw
def gameResult(line):
    if line[2]  == "X":
        if line[0] == "A":
            return DRAW
        elif line[0] == "B":
            return LOSE
        elif line[0] == "C":
            return WIN
    elif line[2] == "Y":
        if line[0] == "A":
            return WIN
        elif line[0] == "B":
            return DRAW
        elif line[0] == "C":
            return LOSE
    elif line[2] == "Z":
        if line[0] == "A":
            return LOSE
        elif line[0] == "B":
            return WIN
        elif line[0] == "C":
            return DRAW

def pointsFromPlay(line):
    if line[2] == "X":
        return ROCK
    elif line[2] == "Y":
        return PAPER
    elif line[2] == "Z":
        return SCISSORS

total = 0

# Itterate over the list to add it up
for line in lines:
    line = line.strip()
    
    total = total + gameResult(line)
    total = total + pointsFromPlay(line)

print(total)