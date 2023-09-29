# Opening the file and storing it in a variable
file = open("day1.txt", "r")
# Making lines variable an array of the lines
lines = file.readlines()

first_cals = 0
second_cals = 0
third_cals = 0

current_cals = 0

# Appending a line break and 1 at the bottom of the file if it doesnt have it already
# This is done to get the code to work properly
if lines[-1] != "1":
    print("Appending file to work for all number combinations...")
    f = open("day1.txt", "a")
    f.write("\n\n1")
    f.close()
    print("File appending done... Continuing with code as normal.")
else:
    print("File appending has already been completed... Continuing with code as normal.")


# for line in lines: "For every line in lines array: create a line variable for that position in the array"
#     print(line.strip()) # Strip removes the extra line breaks that python adds
for line in lines:
    line = line.strip()
    
    if line != '':
        current_cals = current_cals + int(line)
    else:
        if current_cals > third_cals:
            third_cals = current_cals
        
        if third_cals > second_cals:
            temp = second_cals
            second_cals = third_cals
            third_cals = temp
        
        if second_cals > first_cals:
            temp = first_cals
            first_cals = second_cals
            second_cals = temp
        current_cals = 0
        
print(str(first_cals) + ", " + str(second_cals) + ", " + str(third_cals))

print(first_cals + second_cals + third_cals)