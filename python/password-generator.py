import random


def create_password(length:int, min_number:int, min_special:int) -> str:
    '''Creates a password with specified length and a min amount of numbers and characters as specified'''
    SPECIALS = '!@#$%^&*()_+{}|:"<>?[];\',./'
        
    # Get indexes of numbers
    num_indexes = []
    variation = random.randint(0, 3)
    amount_of_indexes = random.randint(min_number, min_number + variation)
    print(amount_of_indexes)
    for i in range(amount_of_indexes):
        new_index = random.randint(0, length - 1)
        if new_index not in num_indexes:
            num_indexes.append(new_index)

    # Get indexes of special characters
    char_indexes = []
    variation = random.randint(0, 3)
    amount_of_indexes = random.randint(min_number, min_number + variation)
    print(amount_of_indexes)
    for i in range(amount_of_indexes):
        new_index = random.randint(0, length - 1)
        if new_index not in char_indexes and new_index not in num_indexes:
            char_indexes.append(new_index)
    
    # Get indexes of uppercase characters
    upper_indexes = []
    variation = random.randint(0, 3)
    amount_of_indexes = random.randint(min_number, min_number + variation)
    print(amount_of_indexes)
    for i in range(amount_of_indexes):
        new_index = random.randint(0, length - 1)
        if new_index not in upper_indexes and new_index not in num_indexes and new_index not in char_indexes:
            upper_indexes.append(new_index)
    
    password:str = ''
    # Create password
    for i in range(length):
        
        if i in num_indexes:
            password += str(random.randint(0, 9))
        elif i in char_indexes:
            password += SPECIALS[random.randint(0, len(SPECIALS) - 1)]
        elif i in upper_indexes:
            password += chr(ord('A') + random.randint(0, 25))
        else:
            password += chr(ord('a') + random.randint(0, 25))
    
    print(num_indexes)
    print(char_indexes)
    print(upper_indexes)
    return password

print(create_password(20, 5, 3))