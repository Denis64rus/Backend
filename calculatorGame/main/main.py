from random import randint, choice

# 1. Приветствие
print("Hello, player!")

# 2. Мануал
print("What is the result of the following expression?")

# 3. Генерация вопроса
ROUNDS = 3

for i in range(ROUNDS):
    random_number_1 = randint(0, 10)
    random_number_2 = randint(0, 10)

    OPERATORS = ['+', '-', '*']

    random_operator = choice(OPERATORS)
    print("Question: " + str(random_number_1) + ' ' + random_operator + ' ' + str(random_number_2))

# 4. Запрос ввода
    player_answer = int(input("Your answer: "))

# 5. Вычисление выражения
    if random_operator == '+':
        correct_answer = random_number_1 + random_number_2
    elif random_operator == '-':
        correct_answer = random_number_1 - random_number_2
    else:
        correct_answer = random_number_1 * random_number_2

# 6. Сравнение ответов
    if player_answer == correct_answer:
        print("Correct!")
    else:
        print("Incorrect! The correct was: " + str(correct_answer))