# Opening the file and storing it in a variable
file = open("day3.txt", "r")
# Making lines variable an array of the lines
lines = file.readlines()

arrays = []

# itterate over lines and split the line into two items in an array
for line in lines:
    line = line.strip()
    
    arrays.append(line)


def find_points(startIndex):
    if startIndex % 3 != 0:
        raise Exception("Start Index is not correct")
    
    match = 0
    
    for letter in arrays[startIndex]:
        if letter in arrays[startIndex + 1] and letter in arrays[startIndex + 2]:
            match = letter
    
    match_ascii = ord(match)

    if match_ascii < 96:
        return match_ascii - 38
    elif match_ascii > 96:
        return match_ascii - 96


total = 0
for i in range(len(arrays)):
    if i % 3 == 0:
        total = total + find_points(i)
        
print(total)