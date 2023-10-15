# Opening the file and storing it in a variable
file = open("day4.txt", "r")
# Making lines variable an array of the lines
lines = file.readlines()

array = []

# convert to an array of two arrays of the numbers then push that into the full array
def split_into_sections():
    for line in lines:
        line = line.strip()
        elf_array = line.split(",")
        
        elf_1 = [int(numeric_string) for numeric_string in elf_array[0].split("-")]
        elf_2 = [int(numeric_string) for numeric_string in elf_array[1].split("-")]
        
        elf_array = [elf_1, elf_2]
        array.append(elf_array)


# finds if one of the parts fits inside the other
# returns true if it does fit, returns false otherwise
def find_if_inside(index):
    array_point = array[index]
    
    # print(array_point[0][0] + " " + array_point [1][0] + "\n" + array_point[0][1] + " " + array_point[1][1])

    # Check one way
    if array_point[0][0] >= array_point [1][0] and array_point[0][0] <= array_point[1][1]:
        return True
    
    # Check the other way
    if array_point[1][0] >= array_point [0][0] and array_point[1][0] <= array_point[0][1]:
        return True
        
    return False


split_into_sections()

total = 0

for i in range(len(array)):
    if find_if_inside(i):
        total = total + 1
        # print(array[i])
        
print(total)