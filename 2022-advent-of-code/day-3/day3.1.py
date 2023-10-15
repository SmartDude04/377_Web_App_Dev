# Opening the file and storing it in a variable
file = open("day3.txt", "r")
# Making lines variable an array of the lines
lines = file.readlines()

arrays = []

# itterate over lines and split the line into two items in an array
for line in lines:
    line = line.strip()
    
    # Get the length
    line_length = len(line)
    
    # Make the two seaperate parts of the array
    # // only divides to an int, not a double
    half_length = line_length // 2
    
    first_half = line[:half_length]
    second_half = line[half_length:]
    
    # Convert to array
    line = [first_half, second_half]
    
    # Add to global arrays variable
    arrays.append(line)
    
def find_points(arrayIndex):
    sack_part = arrays[arrayIndex]
    
    match = 0
    
    for letter in sack_part[0]:
        if letter in sack_part[1]:
            match = letter
            break
    
    match_ascii = ord(match)

    if match_ascii < 96:
        return match_ascii - 38
    elif match_ascii > 96:
        return match_ascii - 96


# Compute total
total = 0

for i in range(len(arrays)):
    total = total + find_points(i)
    
print(total)