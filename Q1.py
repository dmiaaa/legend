file_name = open("password.txt","w")
file_name.write("damia03\n")
file_name.write("mia03\n")
file_name.write("nurdamia06\n")
file_name.write("nurdamia03\n")
file_name.write("nur\n")
file_name.close()

class PasswordManager:
    def __init__(self,password,entered_password):
        self.password=password
        self.entered_password=entered_password

    def old_passwords(self):
        old_pass= self.password [-1]
        return old_pass

    def get_password(self):
        old_pass = self.password
        return old_pass

    def set_passwords(self):

        if self.entered_password not in self.password:
            print("Your password is wrong")
            ans = input(f"Are u sure to insert {self.entered_password} in password.txt? (Yes/No):")
            if ans == "Yes":
                nm = open("password.txt","a")
                nm.write("\n" + self.entered_password)
                nm.close()
                print("Your new password have been entered. Thankyou")

            else:
                print("Thank you.")

        else:
            print(f"Your password {self.entered_password} is correct. You have successfully log in")

    def is_correct(self):
        if self.entered_password == object1.get_password:
            print("You have entered a correct password.")
            
        else:
            object1.set_passwords()

list_of_passwords = open("password.txt").read()
make_as_list = list_of_passwords.split()
passwordd = input("Please enter your password: ")
object1 = PasswordManager(make_as_list,passwordd)
object1.is_correct()

 



