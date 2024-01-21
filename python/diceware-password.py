import random;
lines = [line.strip() for line in open("python/diceware-wordlist.txt", "r")]

def get_dice() -> str:
    num = str(random.randint(1, 6))
    
    for i in range(4):
        num += str(random.randint(1, 6))
        
    return num

word_lookup = {
    
}

for line in lines:
    code, word = line.split()
    
    word_lookup[code] = word
    

pw:str = ''
num_words = int(input("How many words? "))
# Generate password
for i in range(num_words):
    pw += word_lookup[get_dice()] + "-"

pw = pw[:-1]

print(f"Your new password: {pw}")