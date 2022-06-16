# Security login in python
try:
    def information():
        gender = input("Gender: ")
        print("'If you choose not to answer this question, enter -'")
        location = input('Location: ')
        birthdate = input("Birthdate: ")
        birth_year = int(input("Birth year: "))
        birthday_pass_or_not = input("Has your birthday passed?[Y/N]: \n").lower()
        if birthday_pass_or_not == 'y':
            age = 2022 - birth_year
            text_file = open("accounts.txt", "w")
            text_file.write(
                f"Username: {username}\nPassword: {password}\nGender: {gender}\nBirthday: {birthdate} {birth_year}\nLocation: {location}\nAge: {age}")
        elif birthday_pass_or_not == 'n':
            age = 2021 - birth_year
            text_file = open("accounts.txt", "w")
            text_file.write(
                f"Username: {username}\nPassword: {password}\nGender: {gender}\nBirthday: {birthdate} {birth_year}\nLocation: {location}\nAge: {age}")
    question = input("(C)reate an account\nor\n(L)ogin to an existing account:\n").lower()
    if question == 'c':
        username = input('Username: ')
        password = input('Password: ')
        question_2 = input("Would you like to add information\nabout you in your account?[Y/N]\n").lower()
        if question_2 == 'y':
           print(information())
        elif question_2 == 'n':
            text_file = open("accounts.txt", "w")
            text_file.write(f"Username: {username}\nPassword: {password}")
        print('Your account has been added')
    elif question == 'l':
        file = open("accounts.txt")
        username_checking = input("Username: ")
        if (username_checking in file.read()):
            print("")
        else:
            print("Username does not exist")
            print(quit())
        file = open("accounts.txt")
        password_checking = input("Password: ")
        if (password_checking in file.read()):
            print("Logged in")
            question_3 = input("you can explore your account! \nif you need help with what commands to type, enter 'help':\n").lower()
            if question_3 == 'help':
                print('[S]ee your account details and information\n[E]dit you account information\n[L]og out ')
            elif question_3 == 'l':
                print(quit())
            elif question_3 == 's':
                with open("accounts.txt", "r") as f:
                    accounts = [line.strip() for line in f]

                print(accounts[2])
                print(accounts[3])
                print(accounts[4])
                print(accounts[5])
            elif question_3 == 'e':
                with open("accounts.txt", "r") as f:
                    accounts = [line.strip() for line in f]
                    gender = input("Gender: ")
                    print("'If you choose not to answer this question, enter -'")
                    location = input('Location: ')
                    birthdate = input("Birthdate: ")
                    birth_year = int(input("Birth year: "))
                    birthday_pass_or_not = input("Has your birthday passed?[Y/N]: \n").lower()
                    if birthday_pass_or_not == 'y':
                        age = 2022 - birth_year
                        text_file = open("accounts.txt", "w")
                        text_file.write(f" {accounts[0]}\n{accounts[1]}\nGender: {gender}\nBirthday: {birthdate} {birth_year}\nLocation: {location}\nAge: {age}")
                    elif birthday_pass_or_not == 'n':
                        age = 2021 - birth_year
                        text_file = open("accounts.txt", "w")
                        text_file.write(f"{accounts[0]}\n{accounts[1]}\nGender: {gender}\nBirthday: {birthdate} {birth_year}\nLocation: {location}\nAge: {age}")
            else:
                print("Please re-run the program and enter 'help'")

        else:
            print('Wrong password')
    else:
        print("Type either 'c' or 'l'")
except ValueError:
    print('Re-run the program and try again')
    print(quit())
except IndexError:
    print('You do not have any information saved')
    question = input('Would you like to add information about yourself?[Y/N]\n')
    if question == 'n':
        print(quit())
    elif question == 'y':
        gender = input("Gender: ")
        print("'If you choose not to answer this question, enter -'")
        location = input('Location: ')
        birthdate = input("Birthdate: ")
        birth_year = int(input("Birth year: "))
        birthday_pass_or_not = input("Has your birthday passed?[Y/N]:\n").lower()
        print('Information saved')
        if birthday_pass_or_not == 'y':
            age = 2022 - birth_year
            text_file = open("accounts.txt", "w")
            text_file.write(f"{accounts[0]}\n{accounts[1]}\nGender: {gender}\nBirthday: {birthdate} {birth_year}\nLocation: {location}\nAge: {age}")
        elif birthday_pass_or_not == 'n':
            age = 2021 - birth_year
            text_file = open("accounts.txt", "w")
            text_file.write(f"{accounts[0]}\n{accounts[1]}\nGender: {gender}\nBirthday: {birthdate} {birth_year}\nLocation: {location}\nAge: {age}")
