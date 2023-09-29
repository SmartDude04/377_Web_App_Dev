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

total = 0

# Define functions

# Returns what the result of the game needs to be: win (1), lose (-1), draw (0)
def gameResult(line):
    if line[2] == "X":
        return -1
    elif line[2] == "Y":
        return 0
    elif line[2] == "Z":
        return 1
    
    
# Returns the points that will be earned from a game, knowing what the outcome has to be
def pointsFromPlay(line):
    if line[0] == "A":
        if gameResult(line) == -1:
            return SCISSORS + LOSE
        elif gameResult(line) == 0:
            return ROCK + DRAW
        elif gameResult(line) == 1:
            return PAPER + WIN
    elif line[0] == "B":
        if gameResult(line) == -1:
            return ROCK + LOSE
        elif gameResult(line) == 0:
            return PAPER + DRAW
        elif gameResult(line) == 1:
            return SCISSORS + WIN
    elif line[0] == "C":
        if gameResult(line) == -1:
            return PAPER + LOSE
        elif gameResult(line) == 0:
            return SCISSORS + DRAW
        elif gameResult(line) == 1:
            return ROCK + WIN
    
for line in lines:
    line = line.strip()
    
    total = total + pointsFromPlay(line)


print(total)