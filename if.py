#temperature=65
#if temperature>80:
#    print("It's too hot!!")
#    print("Stay inside")
#elif temperature>55:
#    print("Still quite hot!")
#else:
#     print("have a nice day")


name=input("Enter your name: \n")
greeting=("Hi "+name)
mark=float(input("Enter your mark: \n"))
if mark > 80:
   gred=("You are brilliant!")
   print(greeting + ", your mark is " + str(mark)+ " "+ str(gred))
elif mark > 60:
    gred=("You did okay")
    print(greeting + ", your mark is " + str(mark)+ " " +str(gred))
else:
    gred=("Better luck next time")
    print(greeting + ", your mark is " + str(mark)+ " " +str(gred))