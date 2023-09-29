# Opening the file and storing it in a variable
file = open("day1-snippet.txt", "r")
# Making lines variable an array of the lines
lines = file.readlines()

top_cals = 0
current_cals = 0

# for line in lines: "For every line in lines array: create a line variable for that position in the array"
#     print(line.strip()) # Strip removes the extra line breaks that python adds
for line in lines:
    line = line.strip()
    
    if line != '':
        current_cals = current_cals + int(line)
    else:
        current_cals = 0
    
    if current_cals > top_cals:
        top_cals = current_cals


print(top_cals)