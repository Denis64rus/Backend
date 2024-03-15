print("Давай вместе определим, кто ты: гном, орк или всё-таки человек? Смело и честно отвечай на вопросы!")

score_gnom = 0
score_ork = 0
score_human = 0

# Вопрос 1
print("")
print("Вопрос 1. Какой твой рост?")
print("a) Маленький")
print("b) Средний")
print("c) Большой")

answer = input("Ваш ответ: ")

if answer == "a":
    print("Косплеешь Тирриона Ланистера?")
    score_gnom += 1
elif answer == "b":
    print("Эх,неее, ты не сюда")
    score_ork += 1
elif answer == "c":
    print("На Халка претендуешь?")
    score_human += 1
else:
    print("Некорректный ответ!")

# Вопрос 2
print("")
print("Вопрос 2. Какой цвет тебе больше нравится?")
print("a) Красный")
print("b) Оранжевый")
print("c) Желтый")
print("d) Зеленый")
print("e) Голубой")
print("f) Синий")
print("j) Фиолетовый")

answer =input("Ваш ответ: ")

if answer == "a":
    print("Отлично! Ты любишь опасность! Это учтется.")
    score_gnom += 1
elif answer == "b":
    print("А ты теплый")
    score_ork += 1
elif answer == "c":
    print("Да ты солнышко)")
    score_human += 1
elif answer == "d":
    print("Отлично! Мистер Green")
    score_ork += 1
elif answer == "e":
    print("Немножечко в тролля решил поиграть?")
    score_human += 1
elif answer == "f":
    print("Оу! Да ты голубых кровей!")
    score_human += 1
elif answer == "j":
    print("Вау! Самый красивый цвет. Ты молодец!")
    score_gnom += 1
else:
    print("Некорректный ответ!")

# Вопрос 3
print("")
print("Вопрос 3. Каков ты в бою?")
print("a) Хитрость - ключ к победе!")
print("b) Зачем воевать, если можно выпить пиво?")
print("c) Напролом!")

answer = input("Ваш ответ: ")

if answer == "a":
    print("Да ты великий стратег!")
    score_human += 1
elif answer == "b":
    print("Я с тобой!")
    score_gnom += 1
elif answer == "c":
    print("Встретимся в Вальгалле!")
    score_ork += 1
else:
    print("Некорректный ответ!")

# Вопрос 4
print("")
print("Вопрос 4. Какое оружие предпочитаешь?")
print("a) Меч и щит")
print("b) Молот")
print("c) Любое!")

answer = input("Ваш ответ: ")

if answer == "a":
    print("Защита-оборона?)")
    score_gnom += 1
elif answer == "b":
    print("Круши-ломай XD")
    score_ork += 1
elif answer == "c":
    print("Самому слабому хоть бы что в руки получить. Но лучше убегать")
    score_human += 1
else:
    print("Некорректный ответ!")

# Результат
if score_gnom >= score_ork and score_gnom >= score_human:
    print("Поздравляю, ты гном! Пиво ждет тебя!")
elif score_ork >= score_gnom and score_ork >= score_human:
    print("Поздравляю, ты принадлежишь к великому роду воинов! Могучий орк! ")
elif score_human >= score_gnom and score_human >= score_ork:
    print("Поздравляю, ты человек. Земля сама себя не вспашет.")