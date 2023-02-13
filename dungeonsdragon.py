print('''
  ____                                       ____                                   
 / _  |_   _  __ _ _ __  ___   ___   __ _   / _  |__ _ _ __  _ __   ___   __ _ ___  
| | | | | | |/ _` | '_ \/ _ \ / _ \ / _` | | | | |__` | '_ \| '_ \ / _ \ / _` |__ \ 
| |_| | |_| | | | | |_) \__  | (_) | | | | | |_| |  | | |_) | |_) | (_) | | | / __/ 
 \____|_.__/|_| |_| .__/|___/ \___/|_| |_|  \____|  |_|_.__/| .__/ \___/|_| |_\___| 
                   \___|                                     \___|                  

''')

print("Welcome to Dungeons & Dragons")

player_name=input("What is your name, adventure\n")
health=100
damage=20
print("\nWelcome,"+player_name+ " you have " + str(health)+ " health and can do damage "+str(damage))
print("You came acress a dragon! What will you do?")
print("1. Fight")
print("2. Run")


choice=int(input("Enter either 1 or 2: "))

if choice == 1: 
    print("You attack the dragon and do " + str(damage) + ' damage') 
    print('the dragon back off, spit some acid and does 10 damage') 
    health -= 10 
    print('Your current health is ' + str(health)) 
elif choice== 2: 
    print('You run away from the dragon') 
    print('live today for tomorrow') 
else: 
    print("You attack the dragon and do " + str(damage) + "damage") 
    print("the dragon throws rocks at you and deals with twice the damage you inflict")
    damage=damage*2
    print("Your current health is" +str(health))

print("Thanks for playing!")